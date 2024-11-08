<?php

namespace App\Livewire\Admin\Course;

use App\Models\Course;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Create extends Component
{
    use LivewireAlert;
    #[Layout('layouts.admin')]

    public $nama_mata_kuliah;
    public $deskripsi;
    public $tanggal_mulai;
    public $tanggal_selesai;
    public $dosen_id;

    protected $rules = [
        'nama_mata_kuliah' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        'dosen_id' => 'required',
    ];

    public function generateKodeMataKuliah()
    {
        do {
            $code = strtoupper(Str::random(5)); // Generate a 5-character alphanumeric code
        } while (Course::where('kode_mata_kuliah', $code)->exists());

        Log::info('Generated kode_mata_kuliah: ' . $code); // Log the generated code for debugging

        return $code;
    }

    public function submit(){
        $this->validate();

        $kodeMataKuliah = $this->generateKodeMataKuliah();

        Course::create([
            'nama_mata_kuliah' => $this->nama_mata_kuliah,
            'kode_mata_kuliah' => $kodeMataKuliah,
            'deskripsi' => $this->deskripsi,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'dosen_id' => $this->dosen_id, // Ambil ID dosen dari pengguna yang sedang login
        ]);

        $this->alert('success', 'Mata kuliah berhasil ditambahkan', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        return redirect()->route('admin.course.index');
    }


    public function render()
    {
        $dosen = User::whereHas('roles', function($query) {
            $query->where('name', 'Dosen');
        })->pluck('name', 'id');

        return view('livewire.admin.course.create', [
            'dosens' => $dosen
        ]);
    }
}
