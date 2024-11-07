<?php

namespace App\Livewire\Dosen\Tugas;

use App\Models\Assignment;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.app')]

    public $id;
    public $nama_tugas;
    public $deskripsi;
    public $batas_waktu;
    public $file;
    public $course_id;

    protected $rules = [
        'nama_tugas' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'batas_waktu' => 'required|date',
        'file' => 'nullable|file|mimes:pdf,ppt,pptx,doc,docx',
        // 'course_id' => 'required|exists:courses,id',
    ];

    public function mount($id)
    {
        $assignment = Assignment::find($id);

        $this->id   = $assignment->id;
        $this->nama_tugas  = $assignment->nama_tugas;
        $this->deskripsi  = $assignment->deskripsi;
        $this->batas_waktu  = $assignment->batas_waktu;
    }

    public function update(){

        $this->validate();
        $assignment = Assignment::find($this->id);

        $filePath = $this->file
            ? $this->file->store('assignments', 'public')  // Upload to 'storage/app/public/materials'
            : $assignment->file;


        $assignment->update([
            'nama_tugas' => $this->nama_tugas,
            'deskripsi' => $this->deskripsi,
            'batas_waktu' => $this->batas_waktu,
            'file' => $filePath,
        ]);

        $this->alert('success', 'Tugas berhasil diedit', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        return redirect()->route('dosen.matakuliah.material.tugas.detail.{id}', $assignment->id);

    }
    
    public function render()
    {
        return view('livewire.dosen.tugas.edit');
    }
}
