<div class="container">
    <h2>Kelas: {{ $course->nama_mata_kuliah }}</h2>

    <h4>Notifikasi Penilaian</h4>

    @if ($notifications->isNotEmpty())
        <ul>
            @foreach ($notifications as $notification)
                <li>
                    <strong>{{ $notification->data['assignment_title'] }}</strong> - Nilai: {{ $notification->data['grade'] }}
                    <br>
                    Feedback: {{ $notification->data['feedback'] }}
                    <br>
                    <small>{{ $notification->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
        <button wire:click="markAsRead" class="btn btn-primary mt-3">Tandai Semua Sebagai Terbaca</button>
    @else
        <p>Tidak ada notifikasi baru untuk kelas ini.</p>
    @endif
</div>
