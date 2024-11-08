<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Daftar extends Component
{
    use LivewireAlert;
    #[Layout('layouts.auth')]
    public $name;
    public $email;
    public $username;
    public $password;
    public $password_confirmation;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ];
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'password' => Hash::make($this->password),
        ]);

        // Menetapkan peran mahasiswa
        $user->assignRole('dosen');

        // Kirim email verifikasi di sini
        // event(new Registered($user));
        // $user->sendEmailVerificationNotification();

        $this->alert('success', 'Akun berhasil terdaftar', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);

        return redirect()->route('login');
    }
    
    public function render()
    {
        return view('livewire.auth.daftar');
    }
}
