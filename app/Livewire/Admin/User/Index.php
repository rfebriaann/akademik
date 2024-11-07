<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;
    #[Layout('layouts.admin')]

    public $name, $email, $password, $role, $userId;
    public $isEdit = false;
    public $selectedRole = null;
    // public $users = [];
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'role' => 'required|exists:roles,name',
    ];

    public function updatedSelectedRole()
    {
        $this->users = User::role($this->selectedRole)->get();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
    }

    public function createUser()
    {
        $this->validate();

        // Membuat pengguna baru
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        // Menetapkan peran ke pengguna yang baru dibuat
        $user->assignRole($this->role);

        // Memberikan pesan sukses untuk ditampilkan di tampilan
        session()->flash('message', 'User created successfully.');

        // Mengosongkan form setelah berhasil menambah data
        $this->resetForm();
    }
    
    public function destroy($id){
        User::destroy($id);
        session()->flash('message', 'Data berhasil dihapus!');
        return redirect()->route('admin.user.index');
    }

    public function render()
    {
        $this->name = Auth::user()->name;
        return view('livewire.admin.user.index', [
            'users' => User::with('roles')
            ->whereHas('roles', function($query) {
                $query->whereIn('name', ['Mahasiswa', 'Dosen']);
            })
            ->paginate(15),
            'roles' => Role::all(),
        ]);
    }
}
