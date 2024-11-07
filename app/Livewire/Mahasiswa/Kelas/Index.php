<?php

namespace App\Livewire\Mahasiswa\Kelas;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.student')]

    public $search_tugas = '';
    public $search_matkul = '';
    public $course_code;
    public $name;


    public function joinCourse()
    {
        $course = Course::where('kode_mata_kuliah', $this->course_code)->first();

        if ($course) {
            if (!$course->students()->where('user_id', Auth::id())->exists()) {
                $course->students()->attach(Auth::id());
                session()->flash('message', 'Anda berhasil bergabung ke mata kuliah.');
            } else {
                session()->flash('message', 'Anda sudah terdaftar di mata kuliah ini.');
            }
        } else {
            session()->flash('message', 'Kode mata kuliah tidak ditemukan.');
        }
    }

    public function render()
    {
        $user = Auth::user();
        $assignments = Assignment::whereHas('course.users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })
        ->when($this->search_tugas, function ($query) {
            $query->where('nama_tugas', 'like', '%' . $this->search_tugas . '%');
        })
        ->get();


        $course = Auth::user()->courses;

        $courses = Auth::user()->courses()
        ->when($this->search_matkul, function ($query) {
            $query->where('nama_mata_kuliah', 'like', '%' . $this->search_matkul . '%');
        })
        ->get();

        $this->name = Auth::user()->name;

        return view('livewire.mahasiswa.kelas.index', [
            'courses' => $courses,
            // 'submissions' => $submissions,
            'assignments' => $assignments,
        ]);
    }
}
