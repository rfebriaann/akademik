<?php

namespace App\Livewire\Mahasiswa\Kelas;

use App\Models\Assignment;
use App\Models\CourseMaterial;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Detail extends Component
{
    #[Layout('layouts.student')]
    public $id;

    public function render()
    {
        $material = CourseMaterial::where('course_id', $this->id)->get();
        $assignment = Assignment::where('course_id', $this->id)->get();

        return view('livewire.mahasiswa.kelas.detail', [
            'materials' => $material,
            'assignments' => $assignment,
        ]);
    }
}
