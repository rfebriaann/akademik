<?php

namespace App\Livewire\Dosen\Matakuliah;

use App\Models\CourseMaterial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Materi extends Component
{
    public $id;
    public $file;
    public $dosen_id;

    public function render()
    {
        return view('livewire.dosen.matakuliah.materi', [
            'materials' => CourseMaterial::where('uploaded_by', Auth::id())->get()
        ]);
    }
}
