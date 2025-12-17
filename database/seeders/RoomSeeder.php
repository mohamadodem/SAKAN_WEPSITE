<?php

namespace Database\Seeders;

use App\Models\HousingUnit;
use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $units = HousingUnit::all();
        
        foreach ($units as $unit) {
            for ($i = 1; $i <= $unit->total_rooms; $i++) {
                Room::create([
                    'room_number' => $i,
                    'housing_unit_id' => $unit->id,
                    'occupied' => 0,
                ]);
            }
        }
        
    }
}