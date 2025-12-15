<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
      User::create([
          'national_id' => '1',
          'phone' => '1',
          'password' => Hash::make('admin123'),
          'role' => 'admin',
          'first_name' => 'زهراء',
          'last_name' => 'ضعون',
          'father_name' => 'مكسيم',
          'mother_name' => 'رقية',
      ],
    
    [
          'national_id' => '2',
          'phone' => '2',
          'password' => Hash::make('admin123'),
          'role' => 'admin',
          'first_name' => 'محمد',
          'last_name' => 'عضيم',
          'father_name' => 'مخلص',
          'mother_name' => 'رنا',
    ],
      [
          'national_id' => '3',
          'phone' => '3',
          'password' => Hash::make('admin123'),
          'role' => 'admin',
          'first_name' => 'يمام',
          'last_name' => 'جبر',
          'father_name' => 'علي',
          'mother_name' => 'زينب',
      ],
      [
          'national_id' => '4',
          'phone' => '4',
          'password' => Hash::make('admin123'),
          'role' => 'admin',
          'first_name' => 'لبنى',
          'last_name' => 'سفر',
          'father_name' => 'احمد',
          'mother_name' => 'رغدة',
      ]
    );
      
        $this->command->info('تم إنشاء حساب المدير بنجاح.');
    }
}