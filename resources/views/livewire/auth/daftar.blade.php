<div>
    <h2 class="text-2xl font-bold">Registrasi Dosen</h2>

    <form wire:submit.prevent="register" class="mt-4">
        <div>
            <label for="name" class="block">Nama:</label>
            <input type="text" id="name" wire:model="name" class="mt-1 block w-full border-gray-300 rounded-md">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <label for="email" class="block">Email:</label>
            <input type="email" id="email" wire:model="email" class="mt-1 block w-full border-gray-300 rounded-md">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <label for="password" class="block">Password:</label>
            <input type="password" id="password" wire:model="password" class="mt-1 block w-full border-gray-300 rounded-md">
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="block">Konfirmasi Password:</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md">
        </div>

        <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">
            Daftar
        </button>
    </form>

    @if (session()->has('message'))
        <div class="mt-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif
</div>
