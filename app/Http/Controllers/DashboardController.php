<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;

class DashboardController extends Controller
{
    /**
     * Show dashboard
     * GET /dashboard
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Default empty collections (prevents undefined variable errors)
        $jobs = collect();
        $appliedJobs = collect();

        // Employer: jobs they posted
        if ($user->role === 'employer') {
            $jobs = Job::with('applicants')
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        }

        // Normal user: jobs they applied to
        if ($user->role === 'user') {
            $appliedJobs = Job::whereHas('applicants', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
                ->where('status', 'accepted')
                ->with(['applicants' => function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                }])
                ->latest()
                ->get();
        }

        return view('dashboard.index', compact(
            'user',
            'jobs',
            'appliedJobs'
        ));
    }

    public function employer()
    {
        $user = Auth::user();

        if ($user->role !== 'employer') {
            abort(403); // Only employers can access this
        }

        $jobs = Job::with('applicants')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('dashboard.index', compact(
    'user',
    'jobs',
    
));
    }
}
