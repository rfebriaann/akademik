<div>
    <div class="flex flex-col lg:flex-row gap-10 my-10">
        <div class="w-full lg:w-2/3 p-10 bg-white rounded-2xl">
            <div class="flex flex-col gap-4">
                <section class="mt-4">
                    <div class="max-w-screen-xl p-2 mx-auto lg:px-1">
                        <div class="flex justify-between items-center">
                            <a href="{{route('dosen.matakuliah.index')}}">
                                <div class="bg-[#f3f3f3] w-12 rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-900 transition duration-75 group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M15 6l-6 6l6 6"/>
                                    </svg>
                                </div>
                            </a>
                            <div>
                                <h1 class="font-poppins font-semibold text-2xl">Edit Mata Kuliah</h1>
                            </div>
                        </div>
                        <div class="bg-white w-full relative sm:rounded-lg overflow-hidden mt-10">
                            <div class="overflow-x-auto">
                                <form action="" wire:submit="update">
                                    <div class="space-y-6">
                                        <!-- Mata Kuliah -->
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="nama" class="font-medium text-gray-800">
                                                    Mata kuliah <span class="text-red-600">*</span>
                                                </label>
                                                <p class="text-sm text-gray-600">
                                                    Edit nama mata kuliah yang anda ingin tambahkan
                                                </p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input 
                                                    id="nama"
                                                    type="text"
                                                    class="w-full border border-gray-300 p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]"
                                                    wire:model="nama_mata_kuliah"
                                                    wire:target="store"
                                                    name="nama"
                                                    wire:loading.attr="disabled"
                                                />
                                                @error('nama_mata_kuliah')
                                                    <span class="block mt-0 text-xs text-red-600">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Deskripsi -->
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="detail" class="font-medium text-gray-800">
                                                    Deskripsi <span class="text-red-600">*</span>
                                                </label>
                                                <p class="text-sm text-gray-600">
                                                    Edit deskripsi mata kuliah
                                                </p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input 
                                                    type="text"
                                                    id="email"
                                                    name="email"
                                                    class="w-full border border-gray-300 p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[40px]"
                                                    wire:model="deskripsi"
                                                    wire:target="store"
                                                    wire:loading.attr="disabled"
                                                />
                                                @error('deskripsi')
                                                    <span class="block mt-0 text-xs text-red-600">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Tanggal Mulai -->
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="tanggal_mulai" class="font-medium text-gray-800">
                                                    Tanggal Mulai Perkuliahan <span class="text-red-600">*</span>
                                                </label>
                                                <p class="text-sm text-gray-600">
                                                    Edit tanggal mulai perkuliahan
                                                </p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input 
                                                    type="date"
                                                    id="tanggal_mulai"
                                                    name="tanggal_mulai"
                                                    class="w-full border border-gray-300 p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[40px]"
                                                    wire:model="tanggal_mulai"
                                                    wire:target="store"
                                                    wire:loading.attr="disabled"
                                                />
                                                @error('tanggal_mulai')
                                                    <span class="block mt-0 text-xs text-red-600">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Tanggal Selesai -->
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="tanggal_selesai" class="font-medium text-gray-800">
                                                    Tanggal Selesai Perkuliahan <span class="text-red-600">*</span>
                                                </label>
                                                <p class="text-sm text-gray-600">
                                                    Edit tanggal selesai perkuliahan
                                                </p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input 
                                                    type="date"
                                                    id="tanggal_selesai"
                                                    name="tanggal_selesai"
                                                    class="w-full border border-gray-300 p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[40px]"
                                                    wire:model="tanggal_selesai"
                                                    wire:target="store"
                                                    wire:loading.attr="disabled"
                                                />
                                                @error('tanggal_selesai')
                                                    <span class="block mt-0 text-xs text-red-600">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Hidden Inputs -->
                                        <input hidden type="text" id="kode_mata_kuliah" name="kode_mata_kuliah" wire:model="kode_mata_kuliah" wire:target="store" wire:loading.attr="disabled" />
                                        <input hidden type="text" id="dosen_id" name="dosen_id" wire:model="dosen_id" wire:target="store" wire:loading.attr="disabled" />
                                        <!-- Submit Button -->
                                        <div class="flex justify-end">
                                            <button type="submit" class="w-28 rounded-xl p-3 bg-[#0365FE] text-lg text-white hover:bg-[#2678fc]">
                                                Simpan
                                            </button>
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
