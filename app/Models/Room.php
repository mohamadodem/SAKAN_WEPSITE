<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'housing_unit_id',
        'occupied',
    ];

    public function housingUnit()
    {
        return $this->belongsTo(HousingUnit::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function isFull()
    {
        return $this->occupied >= $this->housingUnit->max_room_capacity;
    }
}