<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    public function run(): void
    {
        $faculties = [
            ['faculty_name' => 'كلية الهندسة', 'has_housing' => true],
            ['faculty_name' => 'كلية الطب', 'has_housing' => true],
            ['faculty_name' => 'كلية العلوم', 'has_housing' => true],
            ['faculty_name' => 'كلية الآداب', 'has_housing' => false],
            ['faculty_name' => 'كلية الاقتصاد', 'has_housing' => true],
            ['faculty_name' => 'كلية التربية', 'has_housing' => false],
        ];
        
        foreach ($faculties as $faculty) {
            Faculty::create($faculty);
        }
        
        $this->command->info('تم إنشاء الكليات بنجاح.');
    }
}