<?php

namespace App\Livewire\Dosen\Tugas;

use App\Models\Assignment;
use App\Models\Submission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Detail extends Component
{
    use LivewireAlert;
    #[Layout('layouts.app')]
    
    public $id;
    public $nama_tugas;
    public $deskripsi;
    public $batas_waktu;
    public $file;

    public $course;

    public function mount($id){
        $this->course = Assignment::find($this->id);
    }

    public function destroy($id){
        $assignment = Assignment::find($this->id);
        Assignment::destroy($id);
        $this->alert('success', 'Data berhasil di hapus', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        return redirect()->route('dosen.matakuliah.material.{id}', $assignment->course_id);
    }

    public function render()
    {
        // dd($this->course_id);
        $submission = Submission::where('assignment_id', $this->id)->get();
        $assignment = Assignment::where('id', $this->id)->get();
        return view('livewire.dosen.tugas.detail', [
            'assignments' => $assignment,
            'submissions' => $submission,
        ]);
    }
}
