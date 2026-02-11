<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Job;
use App\Notifications\ApplicationStatusNotification;
use App\Notifications\NewApplicationNotification;


class ApplicantController extends Controller
{
    /**
     * Store a new job application
     */
    public function store(Request $request, Job $job)
    {
        // Ensure user is authenticated
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to apply for a job.');
        }

        // Prevent duplicate applications
        if ($job->applicants()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'You have already applied for this job.');
        }

        // Check if job is still open
        if ($job->deadline && now()->gt($job->deadline)) {
            return redirect()->back()->with('error', 'The application deadline for this job has passed.');
        }

        // Validate input
        $validated = $request->validate([
            'full_name'       => 'required|string|max:255',
            'contact_phone'   => 'nullable|string|max:50',
            'contact_email'   => 'required|email|max:255',
            'message'         => 'nullable|string',
            'location'        => 'nullable|string|max:255',
            'resume'          => 'required|file|mimes:pdf|max:2048',
        ]);

        // Handle resume upload
        if ($request->hasFile('resume')) {
            $validated['resume_path'] = $request->file('resume')->store('resumes', 'public');
        }

        // Create application
        $application = $job->applicants()->create([
            'user_id'       => $user->id,
            'full_name'     => $validated['full_name'],
            'contact_phone' => $validated['contact_phone'] ?? null,
            'contact_email' => $validated['contact_email'],
            'message'       => $validated['message'] ?? null,
            'location'      => $validated['location'] ?? null,
            'resume_path'   => $validated['resume_path'],
            'status'        => 'pending',
        ]);

        // Notify the employer
        $job->user->notify(new NewApplicationNotification($application));


        return redirect()->back()->with('success', 'Your application has been submitted successfully.');
    }

    /**
     * Delete an applicant (Employer only)
     */
    public function destroy(Applicant $applicant)
    {
        $this->authorize('delete', $applicant); // Make sure only the job owner can delete

        $applicant->delete();

        return redirect()->back()->with('success', 'Application deleted successfully.');
    }

    /**
     * Update application status (Employer only)
     */
    public function updateStatus(Request $request, Applicant $applicant)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        abort_if(auth()->id() !== $applicant->job->user_id, 403);

        $applicant->status = $request->status;
        $applicant->save();

        $applicant->user->notify(new ApplicationStatusNotification($applicant));

        return back()->with('success', 'Applicant status updated.');
    }
}
