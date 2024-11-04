<div>
    <div class="h-full my-10 gap-10">
        <div class="flex flex-col gap-10 justify-center">
            
            <div class="w-full p-10 bg-white rounded-2xl">
                <div class="flex flex-col gap-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="font-poppins font-semibold text-xl">Daftar mata kuliah</h1>
                        </div>
                        <div>
                            <a href="{{route('dosen.matakuliah.create')}}" class="bg-[#DA569E] font-poppins text-sm font-medium text-white shadow-md shadow-pink-300 hover:bg-[#e963ad] rounded-2xl px-3 py-2">Tambah Mata Kuliah</a>
                        </div>
                    </div>
                    <div class="flex h-auto w-full gap-4 mt-2">
                        
                        <div class="grid-cols-3 grid gap-4 mb-6 w-full">
                            @foreach ($courses as $i => $course)
                            <a href="{{route('dosen.matakuliah.material.{id}', $course->id)}}" class="">
                                <div class="p-5 h-36  rounded-3xl bg-[#E4E7F1]  transition duration-500 hover:shadow-lg ">
                                    <div class="flex flex-col gap-4">
                                        <div class="flex justify-between">
                                            <div class="bg-[#a0caa7] w-9 rounded-full p-2">
                                                <svg class="w-5 h-5 text-white transition duration-75 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                                    <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                                    <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                                                </svg>
                                            </div>
                                            <div class="p-2">
                                                <svg class="w-5 h-5 text-gray-900 transition duration-75 group-hover:text-white"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="4"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-2 text-gray-900">
                                            <h2 class=" font-medium text-lg font-poppins leading-4">{{ $course->nama_mata_kuliah }}</h2>
                                            <p class=" font-poppins leading-5 text-sm">{{ $course->deskripsi }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>

                        {{-- <div class="relative overflow-x-auto rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-white">
                                <thead class="text-xs text-white uppercase bg-[#303E59] text-center">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-10 py-3">
                                            Mata Kuliah
                                        </th>
                                        <th scope="col" class="px-20 py-3">
                                            Kode Mata Kuliah
                                        </th>
                                        <th scope="col" class="px-20 py-3">
                                            Deskripsi
                                        </th>
                                        <th scope="col" class="px-20 py-3">
                                            Dosen
                                        </th>
                                        <th scope="col" class="px-20 py-3">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $i => $course)
                                        <tr class="odd:bg-[#E4E7F1] even:bg-[#fefefe] border-b border-white/20 text-gray-900">
                                            <td class="px-4 py-4">
                                                {{ $i + 1 }}
                                            </td>
                                            <th scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $course->nama_mata_kuliah }}
                                            </th>
                                            <td class="px-20 py-4 text-gray-900 text-center">
                                                <span class="px-2 py-1 bg-[#86BE90] text-white rounded-xl">
                                                    {{ $course->kode_mata_kuliah }}
                                                </span>
                                            </td>
                                            <td class="px-20 py-4 text-gray-900">
                                                {{ $course->deskripsi }}
                                            </td>
                                            <td class="px-20 py-4 text-gray-900">
                                                {{ $course->dosen->name }}
                                            </td>
                                            <td>
                                                <div class="flex items-center">
                                                    <div>
                                                        <a href="{{route('dosen.matakuliah.edit.{id}', $course->id)}}" class="block px-4 py-2 text-gray-900">Edit Data</a>
                                                    </div>
                                                    <div>
                                                        <button wire:click="destroy({{$course->id}})">Hapus 🗑️</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="basis-1/4 p-10 bg-yellow-500">
                <h1>as</h1>
            </div> --}}
        </div>
    </div>
</div>
