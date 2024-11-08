<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $dosen = User::whereHas('roles', function($query) {
            $query->where('name', 'Dosen');
        })->get();

        if ($dosen->isNotEmpty()) {
            DB::table('courses')->insert([
                [
                    'nama_mata_kuliah' => 'Matematika Dasar',
                    'kode_mata_kuliah' => 'MAT101',
                    'deskripsi' => 'Mata kuliah yang membahas dasar-dasar matematika.',
                    'tanggal_mulai' => Carbon::now(), 
                    'tanggal_selesai' => Carbon::now()->addMonths(4),
                    'dosen_id' => $dosen->first()->id, 
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_mata_kuliah' => 'Pemrograman Web',
                    'kode_mata_kuliah' => 'PW102',
                    'deskripsi' => 'Mata kuliah yang mengajarkan dasar-dasar pemrograman web.',
                    'tanggal_mulai' => Carbon::now()->addDays(10), 
                    'tanggal_selesai' => Carbon::now()->addMonths(3), 
                    'dosen_id' => $dosen->skip(1)->first()->id, 
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama_mata_kuliah' => 'Algoritma',
                    'kode_mata_kuliah' => 'AL102',
                    'deskripsi' => 'Mata kuliah yang mengajarkan dasar-dasar algoritma pemrograman.',
                    'tanggal_mulai' => Carbon::now()->addDays(10), 
                    'tanggal_selesai' => Carbon::now()->addMonths(3),
                    'dosen_id' => $dosen->skip(2)->first()->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
