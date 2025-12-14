<?php

namespace Database\Seeders;

use App\Models\HousingUnit;
use Illuminate\Database\Seeder;

class HousingUnitSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            [
                'unit_name' => 'الوحدة السكنية أ (للذكور)',
                'unit_gender' => 'male',
                'max_room_capacity' => 4,
                'total_rooms' => 20,
                'occupied_rooms' => 0,
                'location' => 'المبنى الرئيسي',
                'description' => 'للطلاب الذكور فقط',
            ],
            [
                'unit_name' => 'الوحدة السكنية ب (للذكور)',
                'unit_gender' => 'male',
                'max_room_capacity' => 3,
                'total_rooms' => 15,
                'occupied_rooms' => 0,
                'location' => 'المبنى الجانبي',
                'description' => 'للطلاب الذكور فقط',
            ],
            [
                'unit_name' => 'الوحدة السكنية ج (للإناث)',
                'unit_gender' => 'female',
                'max_room_capacity' => 4,
                'total_rooms' => 20,
                'occupied_rooms' => 0,
                'location' => 'المبنى الشمالي',
                'description' => 'للطالبات الإناث فقط',
            ],
            [
                'unit_name' => 'الوحدة السكنية د (للإناث)',
                'unit_gender' => 'female',
                'max_room_capacity' => 3,
                'total_rooms' => 15,
                'occupied_rooms' => 0,
                'location' => 'المبنى الجنوبي',
                'description' => 'للطالبات الإناث فقط',
            ],
        ];
        
        foreach ($units as $unit) {
            HousingUnit::create($unit);
        }
        
        $this->command->info('تم إنشاء الوحدات السكنية بنجاح.');
    }
}