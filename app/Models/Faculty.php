<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_name',
        'has_housing',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}