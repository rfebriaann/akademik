<?php 

namespace App\Livewire\Mahasiswa;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class KelasShow extends Component
{
    public $course;
    public $notifications;

    public function mount($courseId)
    {
        $this->course = Course::findOrFail($courseId);

        // Ambil notifikasi yang relevan berdasarkan course_id
        $this->notifications = Auth::user()->unreadNotifications->filter(function ($notification) use ($courseId) {
            return $notification->data['course_id'] == $courseId;
        });
    }

    public function markAsRead()
    {
        // Tandai semua notifikasi sebagai terbaca
        Auth::user()->unreadNotifications->whereIn('id', $this->notifications->pluck('id')->toArray())->markAsRead();

        // Update daftar notifikasi setelah ditandai sebagai terbaca
        $this->notifications = [];
    }

    public function render()
    {
        return view('livewire.mahasiswa.kelas-show');
    }
}
