<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;

class EmployerController extends Controller
{
    public function show(User $user)
    {

        // Get employer's jobs
        $jobs = Job::where('user_id', $user->id)->latest()->get();

        return view('employers.show', compact('user', 'jobs'));
    }
}
