<?php

namespace App\Livewire\Mahasiswa\Kelas;

use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Tugas extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.student')]

    public $id;
    public $file;

    public $submission;

    protected $rules = [
        'file' => 'required|file|mimes:pdf,doc,docx',
    ];

    public function mount($id){
        $this->submission = Submission::where([
            ['assignment_id', $id],
            ['student_id', Auth::id()]
        ])->first();
    }

    public function submitAssignment()
    {
        $this->validate();

        $filePath = $this->file->store('submissions', 'public');
        Submission::updateOrCreate(
            ['assignment_id' => $this->id, 'student_id' => Auth::id()],
            ['file_path' => $filePath]
        );

        $this->alert('success', 'Berhasil submit tugas', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        session()->flash('message', 'Tugas berhasil dikumpulkan.');
        $this->reset('file');
    }

    public function render()
    {
        // dd($this->id);
        $assignments = Assignment::where('id', $this->id)->get();
        $submissions = Submission::where([
            ['assignment_id', $this->id],
            ['student_id', Auth::id()]
        ])->get();
        return view('livewire.mahasiswa.kelas.tugas',[
            'assignments' => $assignments,
            'submissions' => $submissions,
        ]);
    }
}
