<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\User;
use Faker\Factory as Faker;

class CourseMaterialSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $courses = Course::all();
        $dosens = User::whereHas('roles', function($query) {
            $query->where('name', 'Dosen');
        })->get();

        if ($courses->isNotEmpty() && $dosens->isNotEmpty()) {
            foreach ($courses as $course) {
                $randomDosen = $dosens->random();
                $materialCount = rand(2, 5); 

                for ($i = 0; $i < $materialCount; $i++) {
                    DB::table('course_materials')->insert([
                        'material_name' => $faker->sentence,
                        'file_name' => $faker->word . '.pdf',
                        'file_path' => 'courses/' . $course->id . '/' . $faker->word . '.pdf', // Lokasi file
                        'file_type' => 'pdf', // Tipe file, bisa disesuaikan
                        'course_id' => $course->id,
                        'uploaded_by' => $randomDosen->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}

