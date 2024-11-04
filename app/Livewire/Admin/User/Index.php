<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;
    #[Layout('layouts.app')]

    public $name, $email, $password, $role, $userId;
    public $isEdit = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'role' => 'required|exists:roles,name',
    ];

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
        return view('livewire.admin.user.index', [
            'users' => User::with('roles')->paginate(10),
            'roles' => Role::all(),
        ]);
    }
}
