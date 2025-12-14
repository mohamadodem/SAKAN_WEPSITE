<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'university_id',
        'gender',
        'study_year',
        'governorate',
        'faculty_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function hasActiveRequest()
    {
        return $this->requests()
            ->whereIn('status', ['pending', 'accepted'])
            ->exists();
    }

    public function acceptedRequest()
    {
        return $this->requests()
            ->where('status', 'accepted')
            ->first();
    }
}