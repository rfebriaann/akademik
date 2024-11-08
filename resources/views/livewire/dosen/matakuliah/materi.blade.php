<div class="container mx-auto px-4">
    <div class="my-10">
        <div class="flex flex-col lg:flex-row gap-10 lg:justify-center w-full">
            <div class="w-full lg:basis-3/3">
                <div class="flex flex-col gap-0 justify-center w-full">
                    <a href="{{route('dosen.matakuliah.index')}}">
                        <div class="bg-[#FFF] w-12 rounded-full p-2">
                            <svg  xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-900 transition duration-75 group-hover:text-white" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                        </div>
                    </a>
                    <div class="basis-2/5 w-full my-10 rounded-2xl overflow-hidden ">
                        <div class="flex flex-col gap-4 mt-4">
                            <div class="flex justify-between">
                                <div>
                                    <h1 class="font-poppins text-lg sml:text-xl lg:text-3xl">Daftar Materi</h1>
                                </div>
                                <div>
                                    <a href="{{route('dosen.matakuliah.material.create.{id}', $id)}}">
                                        <div class="flex gap-2 bg-[#000] p-1 pr-4 rounded-full items-center">
                                            <span class="rounded-full bg-gray-700 p-1">
                                                <svg class="text-white"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M9 12h6" /><path d="M12 9v6" /></svg>
                                            </span>
                                            <p class="font-medium text-white">Tambah materi</p>
                                        </div>
                                    </a>
                                    {{-- <a href="{{route('dosen.matakuliah.material.create.{id}', $id)}}" class="bg-[#DA569E] font-poppins text-sm font-medium text-white rounded-2xl px-3 py-2">Tambah Materi</a> --}}
                                </div>
                            </div>
                            <div class="mx-4">
                                <input class="w-full rounded-2xl py-2 px-4 mb-4" type="text" id="" wire:model.live="search_mata_kuliah" placeholder="Cari materi">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-5">
                                @foreach ($materials as $i => $material)
                                    <div class="flex flex-col justify-between p-6 rounded-2xl bg-[#D1E3E2] hover:bg-[#ACCAC8] transition duration-300">
                                        
                                        <div class="flex md:flex-row sm:flex-col justify-between items-center">
                                            <div class="flex gap-4 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-signature"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17c3.333 -3.333 5 -6 5 -8c0 -3 -1 -3 -2 -3s-2.032 1.085 -2 3c.034 2.048 1.658 4.877 2.5 6c1.5 2 2.5 2.5 3.5 1l2 -3c.333 2.667 1.333 4 3 4c.53 0 2.639 -2 3 -2c.517 0 1.517 .667 3 2" /></svg>
                                                <h1 class="text-lg font-poppins">{{$material->material_name}}</h1>
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <a href="{{ asset('storage/' . $material->file_path) }}"  class="px-3 py-2 md:rounded-full sm:rounded-md sm:text-center bg-white text-gray-900" target="_blank">Unduh materi</a>
                                                <div class="flex gap-2">
                                                    <a class=" text-white" href="{{route('dosen.matakuliah.material.edit.{id}', $material->id)}}">
                                                        <div class="flex p-0 rounded-full items-center">
                                                            <span class="rounded-full bg-white p-1">
                                                                <svg class="text-black"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                                            </span>
                                                            {{-- <p class="font-medium text-white">Tambah tugas</p> --}}
                                                        </div>
                                                    </a>
                                                    <button wire:click="destroy({{$material->id}})">
                                                        <div class="flex bg-[#000] p-0 rounded-full items-center">
                                                            <span class="rounded-full bg-gray-700 hover:bg-black transition duration-300 p-1">
                                                                <svg  class="text-white" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                            </span>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="w-full my-10 rounded-2xl overflow-hidden ">
                        <div class="flex flex-col gap-4">
                            <div>
                                <h1 class="font-poppins text-lg sml:text-xl lg:text-3xl">Daftar Mahasiswa</h1>
                            </div>
                            <div class="mx-4">
                                <input class="w-full rounded-2xl py-2 px-4 mb-4" type="text" id="" wire:model.live="search_mahasiswa" placeholder="Cari mahasiswa">
                            </div>
                            <div class="w-full bg-[#f4f4f4] rounded-2xl">
                                <div class="relative overflow-x-auto rounded-lg">
                                    <table class="w-full text-sm text-left rtl:text-right text-white">
                                        <thead class="text-xs text-white uppercase bg-[#ACCAC8] text-center">
                                            <tr>
                                                <th scope="col" class="px-4 py-3">
                                                    #
                                                </th>
                                                <th scope="col" class="px-10 py-3">
                                                    Nama mahasiswa
                                                </th>
                                                <th scope="col" class=" py-3">
                                                    Email
                                                </th>
                                                <th scope="col" class=" py-3">
                                                    Username
                                                </th>
                                                {{-- <th scope="col" class="px-3 py-3">
                                                    Aksi
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $i => $student)
                                                <tr class="odd:bg-[#fff] even:bg-[#fefefe] border-b border-white/20 text-gray-900">
                                                    <td class="px-4 py-4">
                                                        {{ $i + 1 }}
                                                    </td>
                                                    <th scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                        {{ $student->user->name }}
                                                    </th>
                                                    <td scope="row" class="px-10 py-4 text-gray-900 whitespace-nowrap">
                                                        {{ $student->user->email }}
                                                    </td>
                                                    <td scope="row" class="px-10 py-4 text-gray-900 whitespace-nowrap">
                                                        {{ $student->user->username }}
                                                    </td>
                                                    {{-- <td class="text-center">
                                                        <div class="flex items-center justify-center gap-2">
                                                            <div>
                                                                <a href="{{route('admin.user.edit.{id}', $student->id)}}" class=" text-gray-900">Edit Data</a>
                                                            </div>
                                                            <div>
                                                                <button wire:click="destroy({{$student->id}})">Hapus 🗑️</button>
                                                            </div>
                                                        </div>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Section (Sidebar) -->
            <div class="w-full h-full lg:basis-1/4">
                <div class="flex flex-col gap-4 h-full lg:h-full justify-center lg:fixed lg:-mt-10 lg:mx-10">
                    <!-- Daftar Tugas Section -->
                    <div class="flex w-full h-full flex-col gap-4 p-6 bg-[#D0E2E2] rounded-2xl overflow-y-auto my-10">
                        <div class="flex justify-between items-center">
                            <h1 class="font-poppins font-semibold text-lg sml:text-xl">Daftar Tugas</h1>
                            <a class="has-tooltip text-white" href="{{route('dosen.matakuliah.material.tugas.{id}', $id)}}">
                                <span class="tooltip w-auto rounded-full shadow-lg px-2 py-1 bg-black mt-8 top-8 right-2 ml-0 transition duration-150">Tambah kelas</span>
                                <div class="flex bg-[#000] p-0 rounded-full items-center">
                                    <span class="rounded-full bg-gray-700 p-1">
                                        <svg class="text-white"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M9 12h6" /><path d="M12 9v6" /></svg>
                                    </span>
                                    {{-- <p class="font-medium text-white">Tambah tugas</p> --}}
                                </div>
                            </a>
                        </div>
                        
                        <p class="text-sm">Pilih tugas untuk melihat detail tugas dan pemberian nilai</p>
                        <input class="w-full rounded-2xl py-1.5 px-4 mb-4" type="text" id="search" wire:model.live="search" placeholder="Cari judul tugas">
                        <div class="flex flex-col gap-4">
                            @foreach ($assignments as $item)
                                <a href="{{route('dosen.matakuliah.material.tugas.detail.{id}', $item->id)}}">
                                    <div class="flex items-center justify-between p-4 rounded-2xl bg-[#ACCAC8] hover:bg-[#a7d3d1] transition duration-75">
                                        <div class="flex items-center gap-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-folder-open"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 19l2.757 -7.351a1 1 0 0 1 .936 -.649h12.307a1 1 0 0 1 .986 1.164l-.996 5.211a2 2 0 0 1 -1.964 1.625h-14.026a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2h4l3 3h7a2 2 0 0 1 2 2v2" /></svg>
                                            <div class="flex flex-col">
                                                <p class="font-poppins">{{$item->nama_tugas}}</p>
                                            </div>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

