<div>
    <div class="flex h-full my-10 gap-10">
        <div class="w-full p-10 bg-white rounded-2xl">
            <div class="flex flex-col gap-4">
                <section class="mt-4">
                    <div class="max-w-screen-xl p-2 mx-auto lg:px-1">
                        <div class="flex justify-between items-center">
                            <a href="{{route('dosen.matakuliah.index')}}">
                                <div class="bg-[#f3f3f3] w-12 rounded-full p-2">
                                    <svg  xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-900 transition duration-75 group-hover:text-white" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                                </div>
                            </a>
                            <div>
                                <h1 class="font-poppins font-semibold text-2xl">Tambah Tugas</h1>
                            </div>
                        </div>
                        <div class="bg-white w-full relative sm:rounded-lg overflow-hidden mt-10">
                            <div class="overflow-x-auto">
                                <form action="" wire:submit="update">
                                    <div class="space-y-6">
                                        <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label 
                                                    for="nama"
                                                    class="font-medium  text-gray-800"
                                                >
                                                    Nama Tugas <span class="text-red-600">*</span>
                                                </label>
                                                <p class="text-sm text-gray-600">
                                                    Edit nama tugas anda
                                                </p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input 
                                                    id="nama_tugas"
                                                    type="text"
                                                    class="w-full border border-gray-300 p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]"
                                                    wire:model="nama_tugas"
                                                    name="nama_tugas"
                                                    wire:loading.attr="disabled"
                                                ></input>
                                                @error('nama_tugas')
                                                    <span class="block mt-0 text-xs text-red-600">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label 
                                                    for="detail"
                                                    class="font-medium text-gray-800"
                                                >
                                                    deskripsi <span class="text-red-600">*</span>
                                                </label>
                                                <p class="text-sm text-gray-600">
                                                    Edit deskripsi tugas 
                                                </p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input 
                                                    type="text"
                                                    id="deskripsi"
                                                    name="deskripsi"
                                                    class="w-full border border-gray-300 p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[40px]"
                                                    wire:model="deskripsi"
                                                    wire:loading.attr="disabled"
                                                ></input>
                                                @error('deskripsi')
                                                    <span class="block mt-0 text-xs text-red-600">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label 
                                                    for="nama"
                                                    class="font-medium  text-gray-800"
                                                >
                                                    Batas waktu tugas <span class="text-red-600">*</span>
                                                </label>
                                                <p class="text-sm text-gray-600">
                                                    Edit batas waktu tugas
                                                </p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input 
                                                    type="date"
                                                    id="email"
                                                    name="batas_waktu"
                                                    class="w-full border border-gray-300 p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[40px]"
                                                    wire:model="batas_waktu"
                                                    wire:target="store"
                                                    wire:loading.attr="disabled"
                                                ></input>
                                                @error('batas_waktu')
                                                    <span class="block mt-0 text-xs text-red-600">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label 
                                                    for="nama"
                                                    class="font-medium  text-gray-800"
                                                >
                                                    Tambahkan file pendukung <span class="text-red-600">*</span>
                                                </label>
                                                <p class="text-sm text-gray-600">
                                                    Edit file pendukung dari tugasnya
                                                </p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input 
                                                    type="file"
                                                    id="file"
                                                    name="file"
                                                    class="w-full border border-gray-300 p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[40px]"
                                                    wire:model="file"
                                                    wire:target="store"
                                                    wire:loading.attr="disabled"
                                                ></input>
                                                @error('file')
                                                    <span class="block mt-0 text-xs text-red-600">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit" class=" w-28 rounded-xl p-3 bg-[#0365FE] text-lg text-white hover:bg-[#2678fc]">simpan</button>
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
