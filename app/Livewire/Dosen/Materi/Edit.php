<?php

namespace App\Livewire\Dosen\Materi;

use App\Models\CourseMaterial;
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

    // public $material;
    public $material_name;
    public $file;

    protected $rules = [
        'material_name' => 'required',
    ];

    public function mount($id)
    {
        $material = CourseMaterial::find($id);

        $this->id   = $material->id;
        $this->material_name  = $material->material_name;
        // $this->file  = $material->file;
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
        ]);

        $this->alert('success', 'Materi berhasil diedit', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        return redirect()->route('dosen.matakuliah.material.{id}', $material->course_id);
    }

    public function render()
    {
        // dd($this->id);
        return view('livewire.dosen.materi.edit');
    }
}
