<?php

namespace App\Livewire\Admin\Assignment;

use App\Models\Assignment;
use App\Models\Course;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    #[Layout('layouts.admin')]

    public $search = '';
    public $selectedCourseId = null;
    public $courses;

    public function mount(){
        $this->courses = Course::all();
    }

    public function destroy($id){
        Assignment::destroy($id);
        session()->flash('message', 'Tugas berhasil dihapus!');
        return redirect()->route('admin.assignment.index');
    }

    public function render()
    {
        $assignments = Assignment::query()
            ->when($this->search, function($query) {
                $query->where('nama_tugas', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedCourseId, function($query) {
                $query->where('course_id', $this->selectedCourseId);
            })
            ->paginate(10);
            
        return view('livewire.admin.assignment.index', [
            'assignments' => $assignments
        ]);
    }
}
