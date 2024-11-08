<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\User;

class CourseUserSeeder extends Seeder
{
    public function run()
    {
        $courses = Course::all();
        $mahasiswas = User::whereHas('roles', function ($query) {
            $query->where('name', 'Mahasiswa');
        })->get();

        if ($courses->isNotEmpty() && $mahasiswas->isNotEmpty()) {
            foreach ($courses as $course) {
                $randomMahasiswa = $mahasiswas->random(rand(1, 5)); // Asumsikan 1-5 mahasiswa per kursus
                foreach ($randomMahasiswa as $mahasiswa) {
                    DB::table('course_users')->insert([
                        'course_id' => $course->id,
                        'user_id' => $mahasiswa->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
