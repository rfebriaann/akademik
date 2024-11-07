<div class="container mx-auto px-4">
    <div class="my-10">
        <div class="flex lg:flex-row gap-10 lg:justify-center">
            <!-- Left Section (Main Content) -->
            <div class="w-full">
                <div class="flex flex-col gap-7 justify-center">
                    <div class="flex justify-between items-center w-full sml:w-4/4 h-24">
                        <div>
                            <h4 class="font-poppins text-xl sml:text-2xl">👋 Selamat datang kembali,</h4>
                            <h1 class="font-poppins text-3xl sml:text-5xl font-medium">{{$name}}</h1>
                        </div>
                        <div>
                            <a href="{{route('dosen.matakuliah.create')}}">
                                <div class="flex gap-2 bg-[#000] p-1 pr-4 rounded-full items-center">
                                    <span class="rounded-full bg-gray-700 p-1">
                                        <svg class="text-white"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M9 12h6" /><path d="M12 9v6" /></svg>
                                    </span>
                                    <p class="font-medium text-white">Tambah mata kuliah</p>
                                </div>
                            </a>
                            {{-- <a href="{{route('dosen.matakuliah.create')}}" class="bg-[#9FB7BB] font-poppins text-md font-medium text-white hover:bg-[#e963ad] rounded-2xl px-3 py-2">Tambah Mata Kuliah</a> --}}
                        </div>
                    </div>
                    <div class="w-full rounded-2xl overflow-hidden">
                        <div class="flex flex-col gap-4">
                            <div>
                                <h1 class="font-poppins text-lg sml:text-xl">Daftar Kelas</h1>
                            </div>
                            <div class="mx-4">
                                <input class="w-full rounded-2xl py-2 px-4 mb-4" type="text" id="" wire:model="search_mata_kuliah" placeholder="Cari mata kuliah">
                            </div>
                            <div class="grid-cols-3 grid gap-4 mb-6 w-full">
                                @foreach ($courses as $i => $course)
                                    <div class="pt-5 pl-5 pr-5 pb-2 h-full  rounded-3xl bg-[#D1E3E2] hover:bg-[#ACCAC8]  transition duration-500 ">
                                        <div class="flex flex-col gap-4">
                                            <a href="{{route('dosen.matakuliah.material.{id}', $course->id)}}">
                                                <div class="flex justify-between gap-4">
                                                    <div class="flex flex-col gap-2 text-gray-900">
                                                        <h2 class=" font-medium text-lg font-poppins leading-4">{{ $course->nama_mata_kuliah }}</h2>
                                                        <p class=" font-poppins leading-5 text-sm">{{ $course->deskripsi }}</p>
                                                    </div>
                                                    <div>
                                                        <svg class="w-5 h-5 text-gray-900 transition duration-75 group-hover:text-white"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="4"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <p class="px-2 p-0.5 rounded-full bg-white text-gray-900">{{$course->kode_mata_kuliah}}</p>
                                                </div>
                                                <div>
                                                    <a href="{{route('dosen.matakuliah.edit.{id}', $course->id)}}">
                                                    <div class="h-full flex justify-end items-center gap-2">
                                                        <div class="flex gap-2 bg-[#fff] p-1 pr-4 rounded-full items-center">
                                                            <span class="rounded-full bg-[#c4e2e0] p-1">
                                                                <svg class="text-black"  xmlns="http://www.w3.org/2000/svg"  width="19"  height="19"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                                            </span>
                                                            <p class="font-medium">Edit</p>
                                                        </div>
                                                    </a>
                                                    <button wire:click="destroy({{$course->id}})">
                                                        <div class="flex gap-2 bg-[#000] p-1 pr-4 rounded-full items-center">
                                                            <span class="rounded-full bg-gray-700 p-1">
                                                                <svg class="text-white"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                            </span>
                                                            <p class="font-medium text-white">Hapus</p>
                                                        </div>
                                                    </button>
                                                </div>
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
