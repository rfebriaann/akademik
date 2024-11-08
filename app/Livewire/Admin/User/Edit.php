<?php
namespace App\Livewire\Admin\User;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    use LivewireAlert;

    #[Layout('layouts.admin')]
    
    public $userId;
    public $nama = '';
    public $email = '';
    public $username = '';
    public $old_password = '';
    public $new_password = '';
    public $new_password_confirmation = '';

    public function mount($id)
    {
        // Get user data by ID
        $user = User::findOrFail($id);

        $this->userId = $user->id;
        $this->nama = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        // $this->password = $user->password;
    }

    protected function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->userId,
            'username' => 'required|string|max:255|unique:users,username,' . $this->userId,
            'old_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:3|confirmed',
        ];
    }

    public function update()
    {
        // dd($this->password);
        $this->validate();

        $user = User::findOrFail($this->userId);

        if ($this->old_password && Hash::check($this->old_password, $user->password)) {
            $user->password = bcrypt($this->new_password);
            return;
        } else {
            $this->addError('old_password', 'Password lama tidak sesuai.');
            // return;
        }

        // Update user data
        $user->update([
            'name' => $this->nama,
            'email' => $this->email,
            'username' => $this->username,
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
