<div class="container mx-auto px-4">
    <div class="flex flex-col lg:flex-row h-full my-10 gap-10">
        <div class="w-full p-6 lg:p-10 bg-white rounded-2xl">
            <div class="flex flex-col gap-4">
                <section class="mt-4">
                    <div class="max-w-screen-xl mx-auto lg:px-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <h1 class="font-poppins font-semibold text-2xl">Tambah Mata Kuliah</h1>
                            </div>
                        </div>
                        <div class="bg-white w-full relative sm:rounded-lg overflow-hidden mt-10">
                            <div class="overflow-x-auto">
                                <form action="" wire:submit.prevent="submit" class="space-y-6">
                                    <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-2 lg:gap-10">
                                        <!-- Mata Kuliah Field -->
                                        <div class="space-y-1">
                                            <label for="nama" class="font-medium text-gray-800">Mata kuliah <span class="text-red-600">*</span></label>
                                            <p class="text-sm text-gray-600">Edit nama mata kuliah yang anda ingin tambahkan</p>
                                            <input 
                                                id="nama" type="text" class="w-full border border-gray-300 p-3 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]"
                                                wire:model="nama_mata_kuliah" wire:loading.attr="disabled"
                                            >
                                            @error('nama_mata_kuliah')
                                                <span class="block mt-1 text-xs text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Dosen Field -->
                                        <div class="space-y-1">
                                            <label for="dosen" class="font-medium text-gray-800">Dosen mata kuliah <span class="text-red-600">*</span></label>
                                            <p class="text-sm text-gray-600">Tambahkan dosen mata kuliah</p>
                                            <select class="w-full border border-gray-300 p-3 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]" wire:model="dosen_id">
                                                <option value="">Pilih dosen</option>
                                                @foreach($dosens as $id => $name)
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Deskripsi Field -->
                                    <div class="space-y-1">
                                        <label for="deskripsi" class="font-medium text-gray-800">Deskripsi <span class="text-red-600">*</span></label>
                                        <p class="text-sm text-gray-600">Edit deskripsi matakuliah</p>
                                        <input 
                                            type="text" id="deskripsi" class="w-full border border-gray-300 p-3 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]"
                                            wire:model="deskripsi" wire:loading.attr="disabled"
                                        >
                                        @error('deskripsi')
                                            <span class="block mt-1 text-xs text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-2 lg:gap-10">
                                        <!-- Tanggal Mulai Field -->
                                        <div class="space-y-1">
                                            <label for="tanggal_mulai" class="font-medium text-gray-800">Tanggal Mulai Perkuliahan <span class="text-red-600">*</span></label>
                                            <p class="text-sm text-gray-600">Edit tanggal mulai perkuliahan anda</p>
                                            <input 
                                                type="date" id="tanggal_mulai" class="w-full border border-gray-300 p-3 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]"
                                                wire:model="tanggal_mulai" wire:loading.attr="disabled"
                                            >
                                            @error('tanggal_mulai')
                                                <span class="block mt-1 text-xs text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Tanggal Selesai Field -->
                                        <div class="space-y-1">
                                            <label for="tanggal_selesai" class="font-medium text-gray-800">Tanggal Selesai Perkuliahan <span class="text-red-600">*</span></label>
                                            <p class="text-sm text-gray-600">Edit tanggal selesai perkuliahan anda</p>
                                            <input 
                                                type="date" id="tanggal_selesai" class="w-full border border-gray-300 p-3 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]"
                                                wire:model="tanggal_selesai" wire:loading.attr="disabled"
                                            >
                                            @error('tanggal_selesai')
                                                <span class="block mt-1 text-xs text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="flex justify-end">
                                        <button type="submit" class="w-full lg:w-28 rounded-xl p-3 bg-[#0365FE] text-lg text-white hover:bg-[#2678fc] transition-colors">Simpan</button>
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
