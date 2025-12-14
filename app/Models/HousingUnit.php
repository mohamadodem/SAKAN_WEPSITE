<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_name',
        'unit_gender',
        'max_room_capacity',
        'total_rooms',
        'occupied_rooms',
        'location',
        'description',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function getAvailableRoomsAttribute()
    {
        return $this->rooms()->where('occupied', '<', $this->max_room_capacity)->get();
    }
}