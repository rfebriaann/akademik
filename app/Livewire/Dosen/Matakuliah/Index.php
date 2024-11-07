<?php

namespace App\Livewire\Dosen\Matakuliah;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    #[Layout('layouts.app')]
    
    public $id;
    public $name;
    
    public function destroy($id){
        Course::destroy($id);

        $this->alert('success', 'Data berhasil di hapus', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        return redirect()->route('dosen.matakuliah.index');
    }

    public function render()
    {
        $this->name = Auth::user()->name;
        return view('livewire.dosen.matakuliah.index', [
            'courses' => Course::where('dosen_id', Auth::id())->get()
        ]);
    }
}
