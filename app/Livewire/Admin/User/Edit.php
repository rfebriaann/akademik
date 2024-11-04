<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    #[Layout('layouts.app')]

    public $id;
    #[Rule('required|min:2|max:100')]
    public $nama = '';
    #[Rule('required|email')]
    public $email = '';
    #[Rule('required|min:6')]
    public $password = '';

    public function mount($id)
    {
        //get post
        $user = User::find($id);

        $this->id   = $user->id;
        $this->nama    = $user->name;
        $this->email  = $user->email;
        $this->password  = $user->password;
    }

    public function update(){
        $this->validate();

        $user = User::find($this->id);

        $user->update([
            'name' => $this->nama,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->alert('success', 'Data berhasil di update', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        return redirect()->route('admin.user.index');
    }

    public function render()
    {
        return view('livewire.admin.user.edit');
    }
}
