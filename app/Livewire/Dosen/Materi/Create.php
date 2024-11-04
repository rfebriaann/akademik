<?php

namespace App\Livewire\Dosen\Materi;

use App\Models\Course;
use App\Models\CourseMaterial;
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

    public $material_name;
    public $file;
    // public $courseId;

    protected $rules = [
        'material_name' => 'required',
        'file' => 'required|file|mimes:pdf,ppt,pptx,doc,docx', // Hanya menerima jenis file tertentu
        // 'courseId' => 'required|exists:courses,id',
    ];

    public function submit()
    {
        $this->validate();

        $filePath = $this->file->store('materials', 'public');

        CourseMaterial::create([
            'material_name' => $this->material_name,
            'file_name' => $this->file->getClientOriginalName(),
            'file_path' => $filePath,
            'file_type' => $this->file->getClientMimeType(),
            'course_id' => $this->id,
            'uploaded_by' => Auth::id(),
        ]);

        $this->alert('success', 'Materi berhasil dibuat', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        return redirect()->route('dosen.matakuliah.material.{id}', $this->id);
    }
    
    public function render()
    {
        $course = Course::where('dosen_id', Auth::id())->get();
        return view('livewire.dosen.materi.create', [
            'courses' => $course
        ]);
    }
}
