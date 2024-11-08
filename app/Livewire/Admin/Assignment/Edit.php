<?php

namespace App\Livewire\Admin\Assignment;

use App\Models\Assignment;
use App\Models\Course;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.admin')]

    public $id;
    public $nama_tugas;
    public $deskripsi;
    public $batas_waktu;
    public $file;
    public $course_id;

    public $courses;

    protected $rules = [
        'nama_tugas' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'batas_waktu' => 'required|date',
        'file' => 'nullable|file|mimes:pdf,ppt,pptx,doc,docx',
        'course_id' => 'required',
    ];

    public function mount($id)
    {
        $assignment = Assignment::find($id);

        $this->id   = $assignment->id;
        $this->nama_tugas  = $assignment->nama_tugas;
        $this->deskripsi  = $assignment->deskripsi;
        $this->batas_waktu  = $assignment->batas_waktu;
        $this->course_id  = $assignment->course_id;

        $this->courses = Course::all();
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
            'course_id' => $this->course_id,
        ]);

        $this->alert('success', 'Tugas berhasil diedit', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        return redirect()->route('admin.assignment.index');

    }

    public function render()
    {
        
        return view('livewire.admin.assignment.edit');
    }
}
