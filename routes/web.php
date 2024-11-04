<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Login;
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

    Route::get('/admin/course/index', App\Livewire\Admin\Course\Index::class)->name('admin.course.index');
    Route::get('/', App\Livewire\Dosen\Dashboard\Index::class)->name('homepage');
});


Route::middleware(['auth', RoleMiddleware::class . ':Dosen'])->group(function () {
    // Mata Kuliah
    Route::get('/dosen/course/index', App\Livewire\Dosen\Matakuliah\Index::class)->name('dosen.matakuliah.index');
    Route::get('/dosen/course/create', App\Livewire\Dosen\Matakuliah\Create::class)->name('dosen.matakuliah.create');
    Route::get('/dosen/course/edit/{id}', App\Livewire\Dosen\Matakuliah\Edit::class)->name('dosen.matakuliah.edit.{id}');
});

Route::middleware(['auth', RoleMiddleware::class . ':Mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', App\Livewire\Mahasiswa\Dashboard\Index::class)->name('mahasiswa.dashboard');
    // Kelas
    Route::get('/mahasiswa/kelas', App\Livewire\Mahasiswa\Kelas\Index::class)->name('mahasiswa.kelas.index');

});
