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


        // dosen
        User::create([
            'name' => 'Dosen',
            'email' => 'dosen@gmail.com',
            'username' => 'dosen',
            'password' => bcrypt('dosen'),
        ])->assignRole('Dosen');
        User::create([
            'name' => 'Dosen 2',
            'email' => 'dosen2@gmail.com',
            'username' => 'dosen2',
            'password' => bcrypt('dosen2'),
        ])->assignRole('Dosen');
        User::create([
            'name' => 'Dosen 3',
            'email' => 'dosen3@gmail.com',
            'username' => 'dosen3',
            'password' => bcrypt('dosen3'),
        ])->assignRole('Dosen');
        User::create([
            'name' => 'Dosen 4',
            'email' => 'dosen4@gmail.com',
            'username' => 'dosen4',
            'password' => bcrypt('dosen4'),
        ])->assignRole('Dosen');

        User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'username' => 'mahasiswa',
            'password' => bcrypt('mahasiswa'),
        ])->assignRole('Mahasiswa');
        User::create([
            'name' => 'Mahasiswa2',
            'email' => 'mahasiswa2@gmail.com',
            'username' => 'mahasiswa2',
            'password' => bcrypt('mahasiswa2'),
        ])->assignRole('Mahasiswa');
        User::create([
            'name' => 'Mahasiswa3',
            'email' => 'mahasiswa3@gmail.com',
            'username' => 'mahasiswa3',
            'password' => bcrypt('mahasiswa3'),
        ])->assignRole('Mahasiswa');
        User::create([
            'name' => 'Mahasiswa4',
            'email' => 'mahasiswa4@gmail.com',
            'username' => 'mahasiswa4',
            'password' => bcrypt('mahasiswa4'),
        ])->assignRole('Mahasiswa');
        User::create([
            'name' => 'Mahasiswa5',
            'email' => 'mahasiswa5@gmail.com',
            'username' => 'mahasiswa5',
            'password' => bcrypt('mahasiswa5'),
        ])->assignRole('Mahasiswa');
    }
}
