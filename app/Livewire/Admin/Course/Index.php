<?php

namespace App\Livewire\Admin\Course;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class Index extends Component
{
    #[Layout('layouts.admin')]
    public $nama_mata_kuliah;
    public $kode_mata_kuliah;
    public $deskripsi;
    public $tanggal_mulai;
    public $tanggal_selesai;

    protected $rules = [
        'nama_mata_kuliah' => 'required|string|max:255',
        'kode_mata_kuliah' => 'required|string|unique:courses,kode_mata_kuliah',
        'deskripsi' => 'nullable|string',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
    ];

    public function createCourse()
    {
        if (!Auth::check()) {
            session()->flash('error', 'Anda harus login sebagai dosen untuk membuat mata kuliah.');
            return;
        }

        // Ambil ID dosen
        // $dosenId = Auth::id();

        $dosenId = 1;

        // Validasi
        $this->validate();

        // Buat kursus baru dan set dosen_id dengan ID pengguna yang sedang login
        Course::create([
            'nama_mata_kuliah' => $this->nama_mata_kuliah,
            'kode_mata_kuliah' => $this->kode_mata_kuliah,
            'deskripsi' => $this->deskripsi,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'dosen_id' => $dosenId, // Ambil ID dosen dari pengguna yang sedang login
        ]);

        session()->flash('message', 'Course created successfully.');

        // Reset form setelah berhasil menyimpan data
        $this->resetForm();
    }
    
    public function resetForm()
    {
        $this->nama_mata_kuliah = '';
        $this->kode_mata_kuliah = '';
        $this->deskripsi = '';
        $this->tanggal_mulai = '';
        $this->tanggal_selesai = '';
    }

    public function render()
    {
        return view('livewire.admin.course.index');
    }
}
