<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Notifications\JobRejectedNotification;
use App\Notifications\JobStatusUpdatedNotification;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $jobs = Job::latest()->paginate(20);
        $totalJobs = Job::count();

        return view('admin.dashboard', compact('users', 'jobs','totalJobs'));
    }

    public function editUser(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:user,employer,admin'
        ]);

        $user->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }

    public function rejectJob(Request $request, Job $job)
    {
        $request->validate([
            'reason' => 'required|string|max:500',
        ]);

        $job->update([
            'status' => 'rejected',
            'rejection_reason' => $request->reason,
        ]);
        $job->user->notify(new JobRejectedNotification($job));

        return redirect()->route('admin.dashboard')->with('success', 'Job rejected successfully.');
    }

    public function updateStatus(Request $request, Job $job)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $job->update([
            'status' => $request->status
        ]);

        // Notify job owner (employer) if rejected
        if ($request->status === 'rejected') {
            $job->user->notify(
                new JobStatusUpdatedNotification($job)
            );
        }

        return back()->with('success', 'Job status updated successfully.');
    }


public function showJob(Job $job)
{
    return view('jobs.show', compact('job'));
}
}
