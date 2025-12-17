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
                'unit_name'         => 'الوحدة السكنية الأولى',
                'unit_gender'       => 'male',
                'max_room_capacity' => 2,
                'total_rooms'       => 20,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الرئيسي',
                'description'       => 'للطلاب الذكور فقط',
            ],
            [
                'unit_name'         => 'الوحدة السكنية الثانية',
                'unit_gender'       => 'female',
                'max_room_capacity' => 4,
                'total_rooms'       => 15,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الجانبي',
                'description'       => 'للطلاب للاناث فقط',
            ],
            [
                'unit_name'         => 'الوحدة السكنية الثالثة',
                'unit_gender'       => 'female',
                'max_room_capacity' => 4,
                'total_rooms'       => 15,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الجانبي',
                'description'       => 'للطلاب للاناث فقط',
            ],
            [
                'unit_name'         => 'الوحدة السكنية الرابعة ',
                'unit_gender'       => 'female',
                'max_room_capacity' => 2,
                'total_rooms'       => 20,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الشمالي',
                'description'       => 'للطالبات الإناث فقط',
            ],
            [
                'unit_name'         => 'الوحدة السكنية الحادية عشر',
                'unit_gender'       => 'male',
                'max_room_capacity' => 4,
                'total_rooms'       => 20,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الرئيسي',
                'description'       => 'للطلاب الذكور فقط',
            ],
            [
                'unit_name'         => 'الوحدة السكنية الثانية عشر',
                'unit_gender'       => 'male',
                'max_room_capacity' => 4,
                'total_rooms'       => 20,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الرئيسي',
                'description'       => 'للطلاب الذكور فقط',
            ],
            [
                'unit_name'         => 'الوحدة السكنية الثالثة عشر',
                'unit_gender'       => 'male',
                'max_room_capacity' => 4,
                'total_rooms'       => 20,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الرئيسي',
                'description'       => 'للطلاب الذكور فقط',
            ],
            [
                'unit_name'         => 'الوحدة السكنية الرابعة عشر',
                'unit_gender'       => 'male',
                'max_room_capacity' => 4,
                'total_rooms'       => 20,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الرئيسي',
                'description'       => 'للطلاب الذكور فقط',
            ],
            [
                'unit_name'         => 'الوحدة السكنية الخامسة عشر',
                'unit_gender'       => 'male',
                'max_room_capacity' => 2,
                'total_rooms'       => 20,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الرئيسي',
                'description'       => 'للطلاب الذكور فقط',
            ],
            [
                'unit_name'         => 'الوحدة السكنية السادسة ',
                'unit_gender'       => 'female',
                'max_room_capacity' => 4,
                'total_rooms'       => 20,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الشمالي',
                'description'       => 'للطالبات الإناث فقط',
            ],
            [
                'unit_name'         => 'الوحدة السكنية السابعة ',
                'unit_gender'       => 'female',
                'max_room_capacity' => 4,
                'total_rooms'       => 20,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الشمالي',
                'description'       => 'للطالبات الإناث فقط',
            ],
            [
                'unit_name'         => 'الوحدة السكنية الثامنة ',
                'unit_gender'       => 'female',
                'max_room_capacity' => 4,
                'total_rooms'       => 20,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الشمالي',
                'description'       => 'للطالبات الإناث فقط',
            ],
            [
                'unit_name'         => 'الوحدة السكنية العاشرة ',
                'unit_gender'       => 'female',
                'max_room_capacity' => 4,
                'total_rooms'       => 20,
                'occupied_rooms'    => 0,
                'location'          => 'المبنى الشمالي',
                'description'       => 'للطالبات الإناث فقط',
            ],
        ];

        foreach ($units as $unit) {
            HousingUnit::create($unit);
        }

    }
}
