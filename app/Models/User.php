<?php

namespace App\Models;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Jobs posted by employer
    public function jobListing()
    {
        return $this->hasMany(Job::class);
    }

    // Bookmarked jobs
    public function bookmarkedJobs()
    {
        return $this->belongsToMany(Job::class, 'job_user_bookmarks')->withTimestamps();
    }

    // Applications
    public function applications()
    {
        return $this->hasMany(Applicant::class);
    }

    public function appliedJobs()
    {
        return $this->hasManyThrough(
            Job::class,
            Applicant::class,
            'user_id',   // FK on applicants
            'id',        // FK on jobs
            'id',        // local user key
            'job_id'     // local applicant key
        );
    }
    // Experiences
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    // Skills
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    public function isEmployer(): bool
    {
        return $this->role === 'employer';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
