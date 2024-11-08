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
    public $search = '';

    public function updatingSelectedRole()
    {
        $this->resetPage();
    }
    
    public function destroy($id){
        User::destroy($id);
        session()->flash('message', 'Data berhasil dihapus!');
        return redirect()->route('admin.user.index');
    }

    public function render()
    {
        $users = User::with('roles')
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['Mahasiswa', 'Dosen']);
            })
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedRole, function ($query) {
                $query->whereHas('roles', function ($query) {
                    $query->where('name', $this->selectedRole);
                });
            })
            ->paginate(15);

        $roles = Role::whereIn('name', ['Mahasiswa', 'Dosen'])->get();


        $this->name = Auth::user()->name;
        return view('livewire.admin.user.index', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }
}
