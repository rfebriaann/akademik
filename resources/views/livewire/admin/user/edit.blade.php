<div class="container mx-auto px-4 my-10">
    <div class="flex flex-col lg:flex-row h-full gap-10 justify-center">
        <div class="w-full lg:w-2/3 p-4 lg:p-10 bg-white rounded-2xl shadow-md">
            <div class="flex flex-col gap-4">
                <section>
                    <div class="max-w-screen-xl p-2 mx-auto">
                        <div class="bg-white w-full relative sm:rounded-lg overflow-hidden">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h1 class="font-poppins font-semibold text-xl lg:text-2xl">Edit Pengguna</h1>
                                </div>
                            </div>
                            <div class="mt-6">
                                <form action="" wire:submit="update">
                                    <div class="space-y-6">
                                        <!-- Name Field -->
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="nama" class="font-medium text-gray-800">Nama <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Edit nama pengguna dengan lengkap dan benar</p>
                                            </div>
                                            <div>
                                                <input id="nama" type="text" class="w-full border border-gray-300 p-2 lg:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50" wire:model="nama" name="nama" wire:loading.attr="disabled">
                                                @error('nama')
                                                    <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Email Field -->
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="email" class="font-medium text-gray-800">Email <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Edit email akun pengguna</p>
                                            </div>
                                            <div>
                                                <input type="email" id="email" name="email" class="w-full border border-gray-300 p-2 lg:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50" wire:model="email" wire:loading.attr="disabled">
                                                @error('email')
                                                    <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Username Field -->
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="username" class="font-medium text-gray-800">Username <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Edit username akun pengguna</p>
                                            </div>
                                            <div>
                                                <input type="text" id="username" name="username" class="w-full border border-gray-300 p-2 lg:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50" wire:model="username" wire:loading.attr="disabled">
                                                @error('username')
                                                    <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Edit Password Section -->
                                        <div>
                                            <p class="text-lg lg:text-xl font-medium">Edit Password</p>
                                            <p class="text-gray-500 text-sm">Kosongkan form password apabila tidak ada perubahan</p>
                                        </div>
                                        <!-- Old Password Field -->
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="old_password" class="font-medium text-gray-800">Password lama <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Edit password lama</p>
                                            </div>
                                            <div>
                                                <input type="password" id="old_password" name="old_password" class="w-full border border-gray-300 p-2 lg:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50" wire:model="old_password" wire:loading.attr="disabled">
                                                @error('old_password')
                                                    <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- New Password Field -->
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="new_password" class="font-medium text-gray-800">Password baru <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Tambahkan password baru</p>
                                            </div>
                                            <div>
                                                <input type="password" id="new_password" name="new_password" class="w-full border border-gray-300 p-2 lg:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50" wire:model="new_password" wire:loading.attr="disabled">
                                                @error('new_password')
                                                    <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Confirm New Password Field -->
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="new_password_confirmation" class="font-medium text-gray-800">Konfirmasi Password baru <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Konfirmasi password baru</p>
                                            </div>
                                            <div>
                                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="w-full border border-gray-300 p-2 lg:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50" wire:model="new_password_confirmation" wire:loading.attr="disabled">
                                                @error('new_password_confirmation')
                                                    <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Submit Button -->
                                        <div class="flex justify-end">
                                            <button type="submit" class="w-full lg:w-28 rounded-xl p-3 bg-[#0365FE] text-lg text-white hover:bg-[#2678fc]">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
