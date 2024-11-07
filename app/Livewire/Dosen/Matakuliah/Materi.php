<?php

namespace App\Livewire\Dosen\Matakuliah;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\CourseMaterial;
use App\Models\CourseUser;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Materi extends Component
{
    use LivewireAlert;

    public $search_mata_kuliah = '';
    public $search_mahasiswa = '';
    public $search_tugas = '';

    public $id;
    public $file;
    public $dosen_id;

    public function destroy($id){
        CourseMaterial::destroy($id);

        $this->alert('success', 'Data berhasil di hapus', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        // return redirect()->route('livewire.dosen.matakuliah.materi.{id}', $this->id);
    }

    public function render()
    {
        $materials = CourseMaterial::where('course_id', $this->id)
            ->where('uploaded_by', Auth::id())
            ->when($this->search_mata_kuliah, function($query) {
                $query->where(function($subquery) {
                    $subquery->where('material_name', 'like', '%' . $this->search_mata_kuliah . '%');
                });
            })
            ->get();
        
        $students = CourseUser::where('course_id', $this->id)
            ->when($this->search_mahasiswa, function($query) {
                $query->whereHas('user', function($subquery) {
                    $subquery->where('name', 'like', '%' . $this->search_mahasiswa . '%');
                });
            })
            ->with('user')
            ->get();
        
            // dd($this->id);
        $assignments = Assignment::where('course_id', $this->id)
        ->when($this->search_tugas, function ($query) {
            $query->where('nama_tugas', 'like', '%' . $this->search_tugas . '%');
        })
        ->get();

        return view('livewire.dosen.matakuliah.materi', [
            'materials' => $materials,
            'students' => $students,
            'assignments' => $assignments
        ]);
    }
}
