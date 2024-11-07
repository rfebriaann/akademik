<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Submission;

class AssignmentGradedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $submission;

    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Penilaian Tugas Telah Dipublikasikan')
                    ->greeting('Halo, ' . $notifiable->name)
                    ->line('Penilaian untuk tugas "' . $this->submission->assignment->nama_tugas . '" telah dipublikasikan.')
                    ->line('Nilai Anda: ' . $this->submission->nilai)
                    // ->action('Lihat Penilaian', url('/assignments/feedback'))
                    ->line('Terima kasih telah menyelesaikan tugas ini!');
    }

    public function toArray($notifiable)
    {
        return [
            'assignment_id' => $this->submission->assignment_id,
            'grade' => $this->submission->gradnilaie,
            'feedback' => $this->submission->feedback,
        ];
    }
}
