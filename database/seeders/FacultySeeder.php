<?php
namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    public function run(): void
    {
        $faculties = [
            ['faculty_name' => 'كلية الهندسة المعلوماتية', 'has_housing' => true],
            ['faculty_name' => 'كلية الهندسة الميكانيكية', 'has_housing' => true],
            ['faculty_name' => 'كلية الهندسة الزراعية', 'has_housing' => true],
            ['faculty_name' => 'كلية الهندسة الكهربائية', 'has_housing' => true],
            ['faculty_name' => 'كلية الهندسة المدنية', 'has_housing' => true],
            ['faculty_name' => 'كلية الطب البشري', 'has_housing' => true],
            ['faculty_name' => 'كلية طب الاسنان', 'has_housing' => true],
            ['faculty_name' => 'كلية  الصيدلة', 'has_housing' => true],
            ['faculty_name' => 'كلية العلوم', 'has_housing' => true],
            ['faculty_name' => 'كلية الآداب', 'has_housing' => false],
            ['faculty_name' => 'كلية الاقتصاد', 'has_housing' => true],
            ['faculty_name' => 'كلية التربية', 'has_housing' => false],
            ['faculty_name' => 'كلية الرياضة', 'has_housing' => false],
        ];
        
        foreach ($faculties as $faculty) {
            Faculty::create($faculty);
        }

    }
}
