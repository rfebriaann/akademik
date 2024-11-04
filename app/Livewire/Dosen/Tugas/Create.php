<?php

namespace App\Livewire\Dosen\Tugas;

use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
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
        'course_id' => 'required|exists:courses,id',
    ];

    public function submit()
    {
        $this->validate();

        $filePath = $this->file ? $this->file->store('assignments', 'public') : null;

        Assignment::create([
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'supporting_file' => $filePath,
            'course_id' => $this->courseId,
            'created_by' => Auth::id(),
        ]);

        $this->alert('success', 'Tugas berhasil dibuat', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        return redirect()->route('dosen.matakuliah.material.{id}', $this->id);
    }
    
    public function render()
    {
        return view('livewire.dosen.tugas.create');
    }
}
