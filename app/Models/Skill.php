<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    // Allow mass assignment for 'name' and 'user_id'
    protected $fillable = [
        'name',
        'user_id',
    ];

    // Each skill belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
