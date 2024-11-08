<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Mahasiswa\KelasShow;
use App\Http\Middleware\RoleMiddleware;
use App\Livewire\Auth\Logout;
use Illuminate\Support\Facades\Auth;


Route::get('/login', \App\Livewire\Auth\Login::class)->name('login')->middleware('guest');
// Route::get('/logout', \App\Livewire\Auth\Logout::class)->name('logout');
Route::get('register', \App\Livewire\Auth\Register::class)->name('register');
Route::get('daftar', \App\Livewire\Auth\Daftar::class)->name('daftar');
Route::get('/logout', [Logout::class, 'logout'])->name('logout');

// Route::post('/logout', function () {
    
// })->name('logout');
        
Route::middleware(['auth', RoleMiddleware::class . ':Admin'])->group(function () {
    // manajemen user
    Route::get('/admin/user/index', App\Livewire\Admin\User\Index::class)->name('admin.user.index');
    Route::get('/admin/user/edit/{id}', App\Livewire\Admin\User\Edit::class)->name('admin.user.edit.{id}');
    Route::get('/admin/user/create', App\Livewire\Admin\User\Create::class)->name('admin.user.create');

    // mata kuliah
    Route::get('/admin/course/index', App\Livewire\Admin\Course\Index::class)->name('admin.course.index');
    Route::get('/admin/course/create', App\Livewire\Admin\Course\Create::class)->name('admin.course.create');
    Route::get('/admin/course/create/{id}', App\Livewire\Admin\Course\Edit::class)->name('admin.course.edit.{id}');
    // Route::get('/', App\Livewire\Dosen\Dashboard\Index::class)->name('homepage');
    
    // materi
    Route::get('/admin/material/index', App\Livewire\Admin\Material\Index::class)->name('admin.material.index');
    Route::get('/admin/material/create', App\Livewire\Admin\Material\Create::class)->name('admin.material.create');
    Route::get('/admin/material/edit/{id}', App\Livewire\Admin\Material\Edit::class)->name('admin.material.edit.{id}');
    
    // assignment
    Route::get('/admin/assignment/index', App\Livewire\Admin\Assignment\Index::class)->name('admin.assignment.index');
    Route::get('/admin/assignment/index', App\Livewire\Admin\Assignment\Index::class)->name('admin.assignment.index');
    Route::get('/admin/assignment/edit/{id}', App\Livewire\Admin\Assignment\Edit::class)->name('admin.assignment.edit.{id}');
    
    // tugas
    Route::get('/admin/submission/index', App\Livewire\Admin\Submission\Index::class)->name('admin.submission.index');
});


Route::middleware(['auth', RoleMiddleware::class . ':Dosen'])->group(function () {
    // Mata Kuliah
    Route::get('/dosen/course/index', App\Livewire\Dosen\Matakuliah\Index::class)->name('dosen.matakuliah.index');
    Route::get('/dosen/course/create', App\Livewire\Dosen\Matakuliah\Create::class)->name('dosen.matakuliah.create');
    Route::get('/dosen/course/edit/{id}', App\Livewire\Dosen\Matakuliah\Edit::class)->name('dosen.matakuliah.edit.{id}');
    // material
    Route::get('/dosen/course/material/{id}', App\Livewire\Dosen\Matakuliah\Materi::class)->name('dosen.matakuliah.material.{id}');
    Route::get('/dosen/course/material/create/{id}', App\Livewire\Dosen\Materi\Create::class)->name('dosen.matakuliah.material.create.{id}');
    Route::get('/dosen/course/material/assignment/{id}', App\Livewire\Dosen\Tugas\Create::class)->name('dosen.matakuliah.material.tugas.{id}');
    Route::get('/dosen/course/material/assignment/detail/{id}', App\Livewire\Dosen\Tugas\Detail::class)->name('dosen.matakuliah.material.tugas.detail.{id}');
    Route::get('/dosen/course/material/assignment/grade/{id}', App\Livewire\Dosen\Penilaian\Create::class)->name('dosen.matakuliah.material.tugas.nilai.{id}');
    Route::get('/dosen/course/material/edit/{id}', App\Livewire\Dosen\Materi\Edit::class)->name('dosen.matakuliah.material.edit.{id}');
    
    Route::get('/dosen/course/material/assignment/edit/{id}', App\Livewire\Dosen\Tugas\Edit::class)->name('dosen.matakuliah.material.tugas.edit.{id}');
});

Route::middleware(['auth', RoleMiddleware::class . ':Mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', App\Livewire\Mahasiswa\Dashboard\Index::class)->name('mahasiswa.dashboard');
    // Kelas
    Route::get('/mahasiswa/kelas', App\Livewire\Mahasiswa\Kelas\Index::class)->name('mahasiswa.kelas.index');
    Route::get('/mahasiswa/kelas/{id}', App\Livewire\Mahasiswa\Kelas\Detail::class)->name('mahasiswa.kelas.{id}');
    Route::get('/mahasiswa/kelas/tugas/{id}', App\Livewire\Mahasiswa\Kelas\Tugas::class)->name('mahasiswa.kelas.tugas.{id}');

    // Route::get('/mahasiswa/kelas/{courseId}', KelasShow::class)->name('mahasiswa.kelas.show');
});
