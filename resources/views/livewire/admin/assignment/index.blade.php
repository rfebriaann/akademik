<div class="container mx-auto px-4">
    <div class="my-10">
        <div class="flex flex-col lg:flex-row gap-10 lg:justify-center">
            <div class="w-full">
                <div class="flex flex-col gap-7 justify-center">
                    <div class="w-full rounded-2xl overflow-hidden">
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                                <h1 class="font-poppins text-2xl sm:text-3xl">Daftartugas</h1>
                                <a href="{{ route('admin.material.create') }}" class="mt-4 sm:mt-0">
                                    <div class="flex gap-2 bg-[#EC6A84] hover:bg-[#F796A9] transition duration-300 p-1 pr-4 rounded-full items-center">
                                        <span class="rounded-full bg-[#F397A8] p-1">
                                            <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"/>
                                                <path d="M9 12h6"/>
                                                <path d="M12 9v6"/>
                                            </svg>
                                        </span>
                                        <p class="font-poppins font-medium text-white">Tambah tugas</p>
                                    </div>
                                </a>
                            </div>

                            <div class="flex flex-col sm:flex-row justify-between items-center mx-4 gap-4">
                                <div class="w-full sm:w-2/3">
                                    <input class="w-full rounded-2xl py-2 px-4 mb-4 sm:mb-0" type="text" wire:model.live="search" placeholder="Cari mata kuliah">
                                </div>
                                <div class="w-full sm:w-1/3">
                                    <select wire:model.live="selectedCourseId" class="w-full rounded-2xl py-2 px-4 mb-4 border">
                                        <option value="">Pilih Mata Kuliah</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->nama_mata_kuliah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="relative overflow-x-auto rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-white">
                                    <thead class="text-xs text-white uppercase bg-[#F57E95] text-center">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">#</th>
                                            <th scope="col" class="px-4 sm:px-10 py-3">Tugas</th>
                                            <th scope="col" class="px-4 sm:px-20 py-3">File</th>
                                            <th scope="col" class="px-4 sm:px-24 py-3">Mata kuliah</th>
                                            <th scope="col" class="px-4 sm:px-24 py-3">Batas waktu</th>
                                            <th scope="col" class="px-4 sm:px-40 py-3">Deskripsi</th>
                                            <th scope="col" class="px-4 sm:px-20 py-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assignments as $index => $assignment)
                                            <tr class="odd:bg-[#E4E7F1] even:bg-[#fefefe] border-b border-white/20 text-gray-900">
                                                <td class="px-4 py-4">{{ $index + 1 }}</td>
                                                <th scope="row" class="px-4 sm:px-10 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $assignment->nama_tugas }}
                                                </th>
                                                <td class="px-4 sm:px-20 py-4">
                                                    <a href="{{ asset('storage/' . $assignment->file) }}" class="px-3 py-2 rounded-full bg-[#F796A8] text-gray-900" target="_blank">Unduh materi</a>
                                                </td>
                                                <td class="px-4 sm:px-2 py-4">{{ $assignment->course->nama_mata_kuliah }}</td>
                                                <td class="px-4 sm:px-20 py-4">
                                                    <p class="font-poppins text-gray-900 text-sm italic">{{ \Carbon\Carbon::parse($assignment->batas_waktu)->translatedFormat('l, j F') }}</p>
                                                </td>
                                                <td class="px-4 sm:px-2 py-4">
                                                    <p class="line-clamp-3">{{ $assignment->deskripsi }}</p>
                                                </td>
                                                <td class="px-8 sm:px-20 py-4">
                                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                                                        <a href="{{route('admin.assignment.edit.{id}', $assignment->id)}}" class="block px-4 py-2 text-gray-900">Edit</a>
                                                        <button wire:click="destroy({{$assignment->id}})" class="text-gray-900">Hapus 🗑️</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="flex justify-center mt-4">
                                    {{ $assignments->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
