<div class="max-w-md mx-auto fixed inset-0 flex items-center justify-center">
<div class="flex flex-col justify-center items-center p-10 rounded-[40px] bg-white gap-4 shadow-lg">
    <h1 class="font-poppins font-medium text-2xl">Daftar akun mahasiswa</h1>
    <p class="font-poppins font-normal text-md leading-snug text-center">Silahkan daftar akun dengan melengkapi form dibawah</p>

    <div class="w-full">
        <form wire:submit.prevent="register">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input wire:model="name" type="text" id="name" class="mt-1 p-2 block w-full border rounded-lg" required>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input wire:model="email" type="email" id="email" class="mt-1 p-2 block w-full border rounded-lg" required>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input wire:model="username" type="username" id="username" class="mt-1 p-2 block w-full border rounded-lg" required>
                @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input wire:model="password" type="password" id="password" class="mt-1 p-2 block w-full border rounded-lg" required>
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Password Confirmation</label>
                <input wire:model="password_confirmation" type="password" id="password_confirmation" class="mt-1 p-2 block w-full border rounded-lg" required>
                @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
    
            <div class="flex items-center justify-between mt-6">
                <button type="submit" class="bg-[#FEC887] text-black px-4 py-2 rounded-xl hover:bg-[#e1b176] w-full">
                    Daftar
                </button>
            </div>
        </form>
    </div>
    <div class="flex flex-col gap-4">
        <p class="font-poppins font-normal text-md leading-snug text-center">Kembali ke halaman <span><a class="text-[#c99e6a]" href="{{route('login')}}">login</a></span></p>
    </div>
</div>
</div>
