<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{

    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $name;
    public $email;
    public $username;
    public $password;
    public $password_confirmation;
    public $role;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:3|confirmed',
    ];

    public function submit()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole($this->role);

        $this->alert('success', 'Berhasil buat akun', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);

        return redirect()->route('admin.user.index');
    }

    public function render()
    {
        $role = Role::all();
        return view('livewire.admin.user.create', [
            'roles' => $role
        ]);
    }
}
