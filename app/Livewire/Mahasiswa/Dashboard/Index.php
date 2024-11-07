<?php

namespace App\Livewire\Mahasiswa\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.student')]
    
    public function render()
    {
        return view('livewire.mahasiswa.dashboard.index');
    }
}
