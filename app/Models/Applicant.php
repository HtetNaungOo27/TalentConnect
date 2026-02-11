<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'user_id',
        'full_name',
        'contact_phone',
        'contact_email',
        'message',
        'location',
        'resume_path',
        'status',
    ];

    // Relation to job
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    // Relation to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}