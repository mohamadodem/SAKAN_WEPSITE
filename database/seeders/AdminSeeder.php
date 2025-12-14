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
            'national_id' => '1234567890',
            'phone' => '0912345678',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'first_name' => 'مدير',
            'last_name' => 'النظام',
            'father_name' => 'الأب',
            'mother_name' => 'الأم',
        ]);
        
        $this->command->info('تم إنشاء حساب المدير بنجاح.');
    }
}