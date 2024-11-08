<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Assignment;
use Carbon\Carbon;

class SubmissionSeeder extends Seeder
{
    public function run()
    {
        // Ambil beberapa mahasiswa dan tugas yang sudah ada di tabel users dan assignments
        $students = User::whereHas('roles', function ($query) {
            $query->where('name', 'Mahasiswa');
        })->get();

        $assignments = Assignment::all();

        // Cek jika ada data mahasiswa dan tugas
        if ($students->isNotEmpty() && $assignments->isNotEmpty()) {
            // Mengisi tabel submissions dengan data contoh
            foreach ($assignments as $assignment) {
                foreach ($students as $student) {
                    DB::table('submissions')->insert([
                        'assignment_id' => $assignment->id,
                        'student_id' => $student->id,
                        'file_path' => 'path/to/file/assignment_' . $assignment->id . '_student_' . $student->id . '.pdf',
                        'nilai' => rand(60, 100), 
                        'feedback' => 'Feedback untuk tugas ' . $assignment->nama_tugas . ' dari ' . $student->name,
                        'is_published' => rand(0, 1) == 1 ? true : false, 
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }
    }
}
