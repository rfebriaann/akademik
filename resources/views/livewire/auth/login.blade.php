
<div class="max-w-md mx-auto fixed inset-0 flex items-center justify-center">
    <div class="flex flex-col justify-center items-center p-10 rounded-[40px] bg-white gap-4 shadow-lg">
        <h1 class="font-poppins font-semibold text-3xl">Login</h1>
        <p class="font-poppins font-normal text-md leading-snug text-center">Masukkan username dan password anda yang telah ter-registrasi</p>

        <div class="w-full">
            <form wire:submit.prevent="login">
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
        
                <div class="flex items-center justify-between mt-6">
                    <button type="submit" class="bg-[#FEC887] text-black px-4 py-2 rounded-xl hover:bg-[#e1b176] w-full">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
        <div class="flex flex-col gap-4">
            <p class="font-poppins font-normal text-md leading-snug text-center"><span><a class="text-[#c99e6a]" href="{{route('register')}}">Daftar disini </a></span> sebagai mahasiswa</p>
            <p class="font-poppins font-normal text-md leading-snug text-center"><span><a class="text-[#c99e6a]" href="{{route('daftar')}}">Daftar disini </a></span> sebagai dosen</p>
        </div>
    </div>
</div>
