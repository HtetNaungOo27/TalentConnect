<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function viewAny(?User $user): bool
    {
        return true; // anyone can see jobs
    }

    public function view(?User $user, Job $job): bool
    {
        return true; // public job listings
    }

    public function create(User $user): bool
    {
        return $user->role === 'employer';
    }

    public function update(User $user, Job $job): bool
    {
        return $user->role === 'employer'
            && $user->id === $job->user_id;
    }

    public function delete(User $user, Job $job): bool
    {
        return $user->role === 'employer'
            && $user->id === $job->user_id;
    }
}
