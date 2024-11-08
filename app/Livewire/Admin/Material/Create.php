<?php

namespace App\Livewire\Admin\Material;

use App\Models\Course;
use App\Models\CourseMaterial;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.admin')]

    public $material_name;
    public $file;
    public $course_id;
    public $uploaded_by;

    protected $rules = [
        'material_name' => 'required',
        'file' => 'required|file|mimes:pdf,ppt,pptx,doc,docx', // Hanya menerima jenis file tertentu
        'course_id' => 'required',
        'uploaded_by' => 'required',
    ];

    public function submit(){
        $this->validate();

        $filePath = $this->file->store('materials', 'public');
        
        CourseMaterial::create([
            'material_name' => $this->material_name,
            'file_name' => $this->file->getClientOriginalName(),
            'file_path' => $filePath,
            'file_type' => $this->file->getClientMimeType(),
            'course_id' => $this->course_id,
            'uploaded_by' => $this->uploaded_by,
        ]);

        $this->alert('success', 'Materi berhasil dibuat', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        return redirect()->route('admin.material.index');
    }
    
    public function render()
    {
        $dosen = User::whereHas('roles', function($query) {
            $query->where('name', 'Dosen');
        })->pluck('name', 'id');
        $courses = Course::all();
        
        return view('livewire.admin.material.create', [
            'dosens' => $dosen,
            'courses' => $courses
        ]);
    }
}
