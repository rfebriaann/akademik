<div class="container mx-auto px-4">
    <div class="flex flex-col lg:flex-row h-full my-10 gap-4 lg:gap-10">
        <div class="w-full p-6 lg:p-10 bg-white rounded-2xl shadow-lg">
            <div class="flex flex-col gap-4">
                <section class="mt-4">
                    <div class="max-w-screen-xl mx-auto lg:px-1">
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                            <div>
                                <h1 class="font-poppins font-semibold text-xl sm:text-2xl">Tambah pengguna</h1>
                            </div>
                        </div>
                        <div class="bg-white w-full relative sm:rounded-lg overflow-hidden mt-6 lg:mt-10">
                            <div class="overflow-x-auto">
                                <form action="" wire:submit.prevent="submit">
                                    <div class="space-y-6">
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="nama" class="font-medium text-gray-800">Nama <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Tambahkan nama pengguna</p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input id="name" type="text" class="w-full border border-gray-300 p-3 sm:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50" wire:model="name" name="name" wire:loading.attr="disabled">
                                                @error('name') <span class="block mt-0 text-xs text-red-600">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="username" class="font-medium text-gray-800">Username <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Tambah username</p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input id="username" type="text" class="w-full border border-gray-300 p-3 sm:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50" wire:model="username" name="username" wire:loading.attr="disabled">
                                                @error('username') <span class="block mt-0 text-xs text-red-600">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="email" class="font-medium text-gray-800">Alamat email <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Tambahkan alamat email pengguna</p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input id="email" type="email" class="w-full border border-gray-300 p-3 sm:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50" wire:model="email" name="email" wire:loading.attr="disabled">
                                                @error('email') <span class="block mt-0 text-xs text-red-600">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="password" class="font-medium text-gray-800">Kata sandi <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Tambahkan kata sandi pengguna</p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input id="password" type="password" class="w-full border border-gray-300 p-3 sm:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50" wire:model="password" name="password" wire:loading.attr="disabled">
                                                @error('password') <span class="block mt-0 text-xs text-red-600">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="password_confirmation" class="font-medium text-gray-800">Konfirmasi kata sandi <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Password harus sama dengan kata sandi yang telah diinputkan sebelumnya</p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input id="password_confirmation" type="password" class="w-full border border-gray-300 p-3 sm:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50" wire:model="password_confirmation" name="password_confirmation" wire:loading.attr="disabled">
                                                @error('password_confirmation') <span class="block mt-0 text-xs text-red-600">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="role" class="font-medium text-gray-800">Pilih jenis akun <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Pilih jenis pengguna</p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <select class="w-full border border-gray-300 p-3 sm:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50" wire:model="role">
                                                    <option value="">Pilih jenis akun</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex justify-end mt-4">
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
