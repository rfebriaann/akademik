<?php

namespace App\Livewire\Admin\Course;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    #[Layout('layouts.admin')]

    public $searchTerm = ''; 
    public $selectedDosen = null;
    protected $updatesQueryString = ['searchTerm', 'selectedDosen'];

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function destroy($id){
        Course::destroy($id);
        session()->flash('message', 'Data berhasil dihapus!');
        return redirect()->route('admin.course.index');
    }

    public function render()
    {
        $dosenList = User::whereHas('roles', function($query) {
            $query->where('name', 'Dosen');
        })->pluck('name', 'id');

        $courses = Course::where(function ($query) {
                $query->where('nama_mata_kuliah', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('kode_mata_kuliah', 'like', '%' . $this->searchTerm . '%');
            })
            ->when($this->selectedDosen, function ($query) {
                $query->where('dosen_id', $this->selectedDosen);
            })
            ->paginate(10);
            
        return view('livewire.admin.course.index', [
            'dosens' => $dosenList,
            'courses' =>  $courses,
        ]);
    }
}
