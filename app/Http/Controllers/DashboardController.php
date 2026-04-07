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

        $jobs = collect();
        $appliedJobs = collect();

        // Employer dashboard
        if ($user->role === 'employer') {
            $jobs = Job::with('applicants')
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        }

        // User dashboard (applications)
        if ($user->role === 'user') {
            $appliedJobs = $user->appliedJobs()
                ->latest('applicants.created_at')
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
