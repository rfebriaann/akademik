<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Daftar extends Component
{
    #[Layout('layouts.auth')]
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Menetapkan peran mahasiswa
        $user->assignRole('dosen');

        // Kirim email verifikasi di sini
        // event(new Registered($user));
        // $user->sendEmailVerificationNotification();

        session()->flash('success', 'Akun Anda telah dibuat! Silakan verifikasi email Anda.');

        return redirect()->route('login');
    }
    
    public function render()
    {
        return view('livewire.auth.daftar');
    }
}
