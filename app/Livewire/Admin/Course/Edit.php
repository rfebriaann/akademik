<?php

namespace App\Livewire\Admin\Course;

use App\Models\Course;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $id;
    public $nama_mata_kuliah;
    public $kode_mata_kuliah;
    public $deskripsi;
    public $tanggal_mulai;
    public $tanggal_selesai;
    public $dosen_id;

    protected $rules = [
        'nama_mata_kuliah' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        'dosen_id' => 'required'
    ];

    public function mount($id)
    {
        $course = Course::find($id);

        $this->id   = $course->id;
        $this->nama_mata_kuliah  = $course->nama_mata_kuliah;
        $this->kode_mata_kuliah  = $course->kode_mata_kuliah;
        $this->deskripsi  = $course->deskripsi;
        $this->tanggal_mulai  = $course->tanggal_mulai;
        $this->tanggal_selesai  = $course->tanggal_selesai;
        $this->dosen_id  = $course->dosen_id;
    }

    public function update(){
        $this->validate();

        $course = Course::find($this->id);

        $course->update([
            'nama_mata_kuliah' => $this->nama_mata_kuliah,
            'kode_mata_kuliah' => $this->kode_mata_kuliah,
            'deskripsi' => $this->deskripsi,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'dosen_id' => $this->dosen_id
        ]);

        $this->alert('success', 'Data berhasil di update', [
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

        return view('livewire.admin.course.edit', [
            'dosens' => $dosen
        ]);
    }
}
