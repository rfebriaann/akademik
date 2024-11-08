<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Dosen 1',
            'email' => 'dosen@gmail.com',
            'username' => 'dosen',
            'password' => bcrypt('dosen'),
        ])->assignRole('Dosen');

        User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'username' => 'mahasiswa',
            'password' => bcrypt('mahasiswa'),
        ])->assignRole('Mahasiswa');
    }
}
