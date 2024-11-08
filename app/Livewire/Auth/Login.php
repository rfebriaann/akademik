<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class Login extends Component
{
    #[Layout('layouts.auth')] 
    
    public $username;
    public $password;

    protected $rules = [
        'username' => 'required',
        'password' => 'required|min:3',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
            session()->regenerate();
            $users = Auth::user();
            if($users->hasRole('Admin')){
                return redirect()->route('admin.user.index');
            } elseif ($users->hasRole('Dosen')) {
                return redirect()->route('dosen.matakuliah.index');
            } elseif ($users->hasRole('Mahasiswa')) {
                return redirect()->route('mahasiswa.kelas.index');
            }
            // return redirect()->intended('/dashboard');
        } else {
            $this->addError('username', 'username atau password salah.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

