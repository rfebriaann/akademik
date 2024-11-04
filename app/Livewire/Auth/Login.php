<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

class Login extends Component
{
    #[Layout('layouts.auth')] 
    
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
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
            $this->addError('email', 'Email atau password salah.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

