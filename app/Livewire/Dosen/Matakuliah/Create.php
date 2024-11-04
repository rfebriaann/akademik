<?php

namespace App\Livewire\Dosen\Matakuliah;

use App\Models\Course;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use Livewirealert;
    #[Layout('layouts.app')]
    public $nama_mata_kuliah;
    public $kode_mata_kuliah;
    public $deskripsi;
    public $tanggal_mulai;
    public $tanggal_selesai;

    protected $rules = [
        'nama_mata_kuliah' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
    ];

    public function generateKodeMataKuliah()
    {
        do {
            $code = strtoupper(Str::random(5)); // Generate a 5-character alphanumeric code
        } while (Course::where('kode_mata_kuliah', $code)->exists());

        Log::info('Generated kode_mata_kuliah: ' . $code); // Log the generated code for debugging

        return $code;
    }

    public function submit()
    {
        $this->validate();

        $kodeMataKuliah = $this->generateKodeMataKuliah();

        Course::create([
            'nama_mata_kuliah' => $this->nama_mata_kuliah,
            'kode_mata_kuliah' => $kodeMataKuliah,
            'deskripsi' => $this->deskripsi,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'dosen_id' => Auth::id(),
        ]);

        $this->alert('success', 'Mata kuliah berhasil ditambahkan', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        return redirect()->route('dosen.matakuliah.index');
    }

    public function render()
    {
        return view('livewire.dosen.matakuliah.create');
    }
}
