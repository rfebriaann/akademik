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
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Dosen 1',
            'email' => 'dosen1@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Dosen');

        User::create([
            'name' => 'Rafli Febrian',
            'email' => 'raflyfebriann@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Mahasiswa');
    }
}
