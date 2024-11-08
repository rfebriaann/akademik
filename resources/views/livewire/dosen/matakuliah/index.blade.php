<div class="container mx-auto px-4">
    <div class="my-10">
        <div class="flex flex-col lg:flex-row gap-10 lg:justify-center">
            <!-- Left Section (Main Content) -->
            <div class="w-full">
                <div class="flex flex-col gap-7 justify-center">
                    <!-- Welcome Message Section -->
                    <div class="flex flex-col sml:flex-row justify-between items-center w-full h-24">
                        <div>
                            <h4 class="font-poppins text-xl sml:text-2xl">👋 Selamat datang kembali,</h4>
                            <h1 class="font-poppins text-3xl sml:text-5xl font-medium">{{$name}}</h1>
                        </div>
                        <div class="mt-4 sml:mt-0">
                            <a href="{{route('dosen.matakuliah.create')}}" class="flex gap-2 bg-black p-1 pr-4 rounded-full items-center">
                                <span class="rounded-full bg-gray-700 p-1">
                                    <svg class="text-white" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                        <path d="M9 12h6" />
                                        <path d="M12 9v6" />
                                    </svg>
                                </span>
                                <p class="font-medium text-white">Tambah mata kuliah</p>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Course List Section -->
                    <div class="w-full rounded-2xl overflow-hidden">
                        <div class="flex flex-col gap-4">
                            <h1 class="font-poppins text-lg sml:text-xl">Daftar Kelas</h1>
                            <div class="mx-4">
                                <input class="w-full rounded-2xl py-2 px-4 mb-4" type="text" id="" wire:model="search_mata_kuliah" placeholder="Cari mata kuliah">
                            </div>
                            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6 w-full">
                                @foreach ($courses as $course)
                                    <div class="pt-5 pl-5 pr-5 pb-2 h-full rounded-3xl bg-[#D1E3E2] hover:bg-[#ACCAC8] transition duration-500">
                                        <div class="flex flex-col gap-4">
                                            <a href="{{route('dosen.matakuliah.material.{id}', $course->id)}}">
                                                <div class="flex justify-between gap-4">
                                                    <div class="flex flex-col gap-2 text-gray-900">
                                                        <h2 class="font-medium text-lg font-poppins leading-4">{{ $course->nama_mata_kuliah }}</h2>
                                                        <p class="font-poppins leading-5 text-sm line-clamp-3">{{ $course->deskripsi }}</p>
                                                    </div>
                                                    <svg class="w-5 h-5 text-gray-900 transition duration-75 group-hover:text-white" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M9 6l6 6l-6 6" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <div class="flex justify-between items-center">
                                                <p class="px-2 py-0.5 rounded-full bg-white text-gray-900">{{$course->kode_mata_kuliah}}</p>
                                                <div class="flex gap-2">
                                                    <a href="{{route('dosen.matakuliah.edit.{id}', $course->id)}}" class="flex gap-2 bg-white p-1 pr-4 rounded-full items-center">
                                                        <span class="rounded-full bg-[#c4e2e0] p-1">
                                                            <svg class="text-black" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                                <path d="M13.5 6.5l4 4" />
                                                            </svg>
                                                        </span>
                                                        <p class="font-medium">Edit</p>
                                                    </a>
                                                    <button wire:click="destroy({{$course->id}})" class="flex gap-2 bg-black p-1 pr-4 rounded-full items-center">
                                                        <span class="rounded-full bg-gray-700 p-1">
                                                            <svg class="text-white" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M4 7l16 0" />
                                                                <path d="M10 11l0 6" />
                                                                <path d="M14 11l0 6" />
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            </svg>
                                                        </span>
                                                        <p class="font-medium text-white">Hapus</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
