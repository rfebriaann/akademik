<?php

namespace App\Livewire\Admin\Material;

use App\Models\Course;
use App\Models\CourseMaterial;
use App\Models\Material;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $selectedCourse = null;
    
    public function destroy($id){
        CourseMaterial::destroy($id);
        session()->flash('message', 'Data berhasil dihapus!');
        return redirect()->route('admin.material.index');
    }

    public function render()
    {
        $courses = Course::all();

        $materials = CourseMaterial::where(function ($query) {
                $query->where('material_name', 'like', '%' . $this->searchTerm . '%');
            })
            ->when($this->selectedCourse, function ($query) {
                $query->where('course_id', $this->selectedCourse);
            })
            ->paginate(10);

        return view('livewire.admin.material.index', [
            'courses' => $courses,
            'materials' => $materials
        ]);
    }
}
