<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;

class AssignmentSeeder extends Seeder
{
    public function run()
    {
        $courses = Course::all();
        $dosens = User::whereHas('roles', function($query) {
            $query->where('name', 'Dosen');
        })->get();

        if ($courses->isNotEmpty() && $dosens->isNotEmpty()) {
            foreach ($courses as $course) {
                foreach ($dosens as $dosen) {
                    DB::table('assignments')->insert([
                        'nama_tugas' => 'Tugas ' . $course->nama_mata_kuliah,
                        'deskripsi' => 'Deskripsi tugas untuk ' . $course->nama_mata_kuliah,
                        'batas_waktu' => Carbon::now()->addDays(rand(7, 14)),
                        'file' => 'storage/tugas_' . $course->id . '_dosen_' . $dosen->id . '.pdf',
                        'course_id' => $course->id,
                        'created_by' => $dosen->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }
    }
}
