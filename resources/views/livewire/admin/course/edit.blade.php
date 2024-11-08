<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row h-full my-10 gap-4 lg:gap-10">
        <div class="w-full lg:p-10 p-4 bg-white rounded-2xl shadow-md">
            <div class="flex flex-col gap-4">
                <section class="mt-4">
                    <div class="max-w-screen-xl mx-auto">
                        <div class="flex flex-col sm:flex-row justify-between items-center">
                            {{-- <a href="{{route('dosen.matakuliah.index')}}">
                                <div class="bg-gray-200 w-10 h-10 sm:w-12 sm:h-12 rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-900 transition duration-75 group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 6l-6 6l6 6" />
                                    </svg>
                                </div>
                            </a> --}}
                            <div class="mt-4 sm:mt-0">
                                <h1 class="font-poppins font-semibold text-xl sm:text-2xl text-center sm:text-left">Edit Mata Kuliah</h1>
                            </div>
                        </div>
                        <div class="bg-white w-full relative rounded-lg overflow-hidden mt-6 sm:mt-10">
                            <div class="overflow-x-auto">
                                <form action="" wire:submit="update" class="space-y-6">
                                    <!-- Course Name -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-10">
                                        <div>
                                            <label for="nama" class="font-medium text-gray-800">Mata kuliah <span class="text-red-600">*</span></label>
                                            <p class="text-sm text-gray-600">Edit nama mata kuliah yang anda ingin tambahkan</p>
                                        </div>
                                        <div class="pt-0 sm:pt-3">
                                            <input id="nama" type="text" class="w-full border border-gray-300 p-2 sm:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 min-h-[30px]" wire:model="nama_mata_kuliah" name="nama" wire:loading.attr="disabled">
                                            @error('nama_mata_kuliah') <span class="block mt-0 text-xs text-red-600">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Lecturer Selection -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-10">
                                        <div>
                                            <label class="font-medium text-gray-800">Dosen mata kuliah <span class="text-red-600">*</span></label>
                                            <p class="text-sm text-gray-600">Edit dosen mata kuliah</p>
                                        </div>
                                        <div class="pt-0 sm:pt-3">
                                            <select class="w-full border border-gray-300 p-2 sm:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800" wire:model="dosen_id">
                                                <option value="">Pilih dosen</option>
                                                @foreach($dosens as $id => $name)
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                            @error('dosen_id') <span class="block mt-0 text-xs text-red-600">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Course Description -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-10">
                                        <div>
                                            <label for="detail" class="font-medium text-gray-800">Deskripsi <span class="text-red-600">*</span></label>
                                            <p class="text-sm text-gray-600">Edit deskripsi mata kuliah</p>
                                        </div>
                                        <div class="pt-0 sm:pt-3">
                                            <input type="text" id="detail" class="w-full border border-gray-300 p-2 sm:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800" wire:model="deskripsi" wire:loading.attr="disabled">
                                            @error('deskripsi') <span class="block mt-0 text-xs text-red-600">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Start Date -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-10">
                                        <div>
                                            <label class="font-medium text-gray-800">Tanggal Mulai Perkuliahan <span class="text-red-600">*</span></label>
                                            <p class="text-sm text-gray-600">Edit tanggal mulai perkuliahan anda</p>
                                        </div>
                                        <div class="pt-0 sm:pt-3">
                                            <input type="date" class="w-full border border-gray-300 p-2 sm:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800" wire:model="tanggal_mulai" wire:loading.attr="disabled">
                                            @error('tanggal_mulai') <span class="block mt-0 text-xs text-red-600">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- End Date -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-10">
                                        <div>
                                            <label class="font-medium text-gray-800">Tanggal Selesai Mata Perkuliahan <span class="text-red-600">*</span></label>
                                            <p class="text-sm text-gray-600">Edit tanggal selesai perkuliahan anda</p>
                                        </div>
                                        <div class="pt-0 sm:pt-3">
                                            <input type="date" class="w-full border border-gray-300 p-2 sm:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800" wire:model="tanggal_selesai" wire:loading.attr="disabled">
                                            @error('tanggal_selesai') <span class="block mt-0 text-xs text-red-600">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <!-- Hidden Inputs -->
                                    <input type="hidden" wire:model="kode_mata_kuliah">
                                    <input type="hidden" wire:model="dosen_id">

                                    <!-- Submit Button -->
                                    <div class="flex justify-end">
                                        <button type="submit" class="w-full sm:w-28 p-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
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
