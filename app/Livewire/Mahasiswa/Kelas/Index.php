<?php

namespace App\Livewire\Mahasiswa\Kelas;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.app')]

    public $course_code;

    public function joinCourse()
    {
        $course = Course::where('kode_mata_kuliah', $this->course_code)->first();

        if ($course) {
            // Check if the student is already enrolled
            if (!$course->students()->where('user_id', Auth::id())->exists()) {
                // Attach student to the course
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
        $course = Auth::user()->courses;
        return view('livewire.mahasiswa.kelas.index', [
            'courses' => $course
        ]);
    }
}
