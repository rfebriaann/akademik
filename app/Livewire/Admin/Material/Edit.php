<?php

namespace App\Livewire\Admin\Material;

use App\Models\Course;
use App\Models\CourseMaterial;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    #[Layout('layouts.app')]

    public $id;

    public $material_name;
    public $file;
    public $file_name;
    public $file_path;
    public $file_type;
    public $course_id;
    public $uploaded_by;

    protected $rules = [
        'material_name' => 'required',
    ];

    public function mount($id)
    {
        $material = CourseMaterial::findOrFail($id);
        $this->id = $material->id;
        $this->material_name = $material->material_name;
        $this->file_name = $material->file_name;
        $this->file_path = $material->file_path;
        $this->file_type = $material->file_type;
        $this->course_id = $material->course_id;
        $this->uploaded_by = $material->uploaded_by;
    }
    
    public function update()
    {
        $this->validate();
        $material = CourseMaterial::find($this->id);

        $filePath = $this->file
            ? $this->file->store('materials', 'public')  // Upload to 'storage/app/public/materials'
            : $material->file_path;


        $material->update([
            'material_name' => $this->material_name,
            'file_name' => $this->file ? $this->file->getClientOriginalName() : $material->file_name,
            'file_path' => $filePath,
            'file_type' => $this->file ? $this->file->getClientMimeType() : $material->file_type,
            'course_id' => $this->course_id,
            'uploaded_by' => $this->uploaded_by,
        ]);

        $this->alert('success', 'Materi berhasil diedit', [
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
        
        return view('livewire.admin.material.edit', [
            'dosens' => $dosen,
            'courses' => $courses
        ]);
    }
}
