<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job_listings';
    protected $fillable = [
        'title',
        'description',
        'salary',
        'tags',
        'job_type',
        'remote',
        'requirements',
        'benefits',
        'address',
        'city',
        'state',
        'zipcode',
        'contact_email',
        'contact_phone',
        'company_name',
        'company_description',
        'company_logo',
        'company_website',
        'user_id',
        'status',
        'rejection_reason'
    ];

    //relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookmarkedByUsers()
    {
        return $this->belongsToMany(User::class, 'job_user_bookmarks')->withTimestamps();
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    protected static function booted()
    {
        static::creating(function ($job) {
            $job->deadline = now()->addMonths(3);
        });
    }

    public function isExpired()
    {
        return $this->deadline && $this->deadline->isPast();
    }

    public function openingsLeft(): int
{
    $acceptedCount = $this->applicants()->where('status', 'accepted')->count();

    return max(0, $this->openings - $acceptedCount);
}
}
