<div class="container mx-auto px-4">
    <div class="my-10">
        <div class="flex flex-col lg:flex-row gap-10 lg:justify-center">
            <div class="w-full">
                <div class="flex flex-col gap-7 justify-center">
                    <div class="w-full rounded-2xl overflow-hidden">
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                <h1 class="font-poppins text-2xl sm:text-3xl">Daftar Mata Kuliah</h1>
                                <a href="{{ route('admin.course.create') }}" class="mt-4 sm:mt-0">
                                    <div class="flex gap-2 bg-[#EC6A84] hover:bg-[#F796A9] transition duration-300 p-1 pr-4 rounded-full items-center">
                                        <span class="rounded-full bg-[#F397A8] p-1">
                                            <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"/>
                                                <path d="M9 12h6"/>
                                                <path d="M12 9v6"/>
                                            </svg>
                                        </span>
                                        <p class="font-poppins font-medium text-white">Tambah mata kuliah</p>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="flex flex-col lg:flex-row justify-between items-center gap-4 lg:gap-10 mx-4">
                                <div class="w-full lg:w-2/3">
                                    <input class="w-full rounded-2xl py-2 px-4 mb-4" type="text" wire:model.live="searchTerm" placeholder="Cari mata kuliah">
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <select wire:model.live="selectedDosen" class="w-full rounded-2xl py-2 px-4 mb-4 border">
                                        <option value="">Pilih Dosen</option>
                                        @foreach($dosens as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="relative overflow-x-auto rounded-lg">
                                <table class="w-full text-sm text-left text-white">
                                    <thead class="text-xs text-white uppercase bg-[#F57E95] text-center">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">#</th>
                                            <th scope="col" class="px-10 py-3">Mata kuliah</th>
                                            <th scope="col" class="px-20 py-3">Kode kelas</th>
                                            <th scope="col" class="px-24 py-3">Dosen</th>
                                            <th scope="col" class="px-40 py-3">Deskripsi</th>
                                            <th scope="col" class="px-20 py-3">Tanggal mulai</th>
                                            <th scope="col" class="px-20 py-3">Tanggal berakhir</th>
                                            <th scope="col" class="px-20 py-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $index => $course)
                                            <tr class="odd:bg-[#E4E7F1] even:bg-[#fefefe] border-b border-white/20 text-gray-900">
                                                <td class="px-4 py-4">
                                                    {{ $index + 1 }}
                                                    <!-- Pagination calculation for item index can be uncommented if needed -->
                                                    {{-- {{ ($course->currentPage() - 1) * $courses->perPage() + $index + 1 }} --}}
                                                </td>
                                                <td class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $course->nama_mata_kuliah }}
                                                </td>
                                                <td class="px-20 py-4 text-gray-900">
                                                    {{ $course->kode_mata_kuliah }}
                                                </td>
                                                <td class="px-2 py-4 text-gray-900">
                                                    {{ $course->dosen->name }}
                                                </td>
                                                <td class="px-2 py-4 text-gray-900">
                                                    <p class="line-clamp-3">{{ $course->deskripsi }}</p>
                                                </td>
                                                <td class="px-20 py-4 text-gray-900">
                                                    {{\Carbon\Carbon::setLocale('id')}}
                                                    <p class="font-poppins text-sm italic">{{ \Carbon\Carbon::parse($course->tanggal_mulai)->translatedFormat('l, j F') }}</p>
                                                </td>
                                                <td class="px-20 py-4 text-gray-900">
                                                    <p class="font-poppins text-sm italic">{{ \Carbon\Carbon::parse($course->tanggal_selesai)->translatedFormat('l, j F') }}</p>
                                                </td>
                                                <td class="px-20 py-4">
                                                    <div class="flex gap-4">
                                                        <a href="{{route('admin.course.edit.{id}', $course->id)}}" class="text-blue-500">Edit</a>
                                                        <button wire:click="destroy({{ $course->id }})" class="text-red-500">Hapus</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="flex justify-center mt-4">
                                    {{ $courses->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
