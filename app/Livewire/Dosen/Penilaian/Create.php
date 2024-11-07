<?php

namespace App\Livewire\Dosen\Penilaian;

use App\Models\Submission;
use App\Notifications\AssignmentGradedNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    #[Layout('layouts.app')]

    public $id;
    public $submissions;
    public $assignmentId;
    public $feedback;
    public $grade;
    public $submission;

    protected $rules = [
        'feedback' => 'nullable|string|max:1000',
        'grade' => 'required|integer|min:0|max:100',
    ];

    public function mount(){

    }

    public function submit()
    {
        $this->validate();

        $submission = Submission::findOrFail($this->id);
        $submission->update([
            'feedback' => $this->feedback,
            'nilai' => $this->grade,
            'is_published' => true, // Menandai penilaian sudah dipublikasikan
        ]);

        $this->alert('success', 'Penilaian berhasil dibuat', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $student = $submission->student;
        if ($student) {
            $student->notify(new AssignmentGradedNotification($submission));
            Log::info('Notifikasi berhasil dikirim ke mahasiswa.');
        } else {
            Log::error('Mahasiswa tidak ditemukan.');
        }
        $submission->student->notify(new AssignmentGradedNotification($submission));
        session()->flash('message', 'Penilaian berhasil disimpan dan notifikasi telah dikirim.');

        // return redirect()->route('dosen.matakuliah.material.tugas.detail.{id}', $this->id);
    }

    // public function mount()
    // {
    //     // Ambil semua tugas yang telah dinilai dan dipublikasikan untuk mahasiswa yang sedang login
    //     $this->submissions = Submission::where('student_id', Auth::id())
    //                                 ->where('is_published', true)
    //                                 ->with('assignment')
    //                                 ->get();
    // }

    public function render()
    {
        return view('livewire.dosen.penilaian.create');
    }
}
