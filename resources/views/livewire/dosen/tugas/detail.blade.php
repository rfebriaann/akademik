<div class="container mx-auto px-4">
    <div class="my-10">
        <div class="flex lg:flex-row gap-10 lg:justify-center">
            <!-- Left Section (Main Content) -->
            <div class="w-full">
                <div class="flex flex-col gap-7 justify-center">
                    <div class="w-full rounded-2xl overflow-hidden">
                        <div class="flex flex-col gap-4">
                            <div class="flex justify-between">
                                <div>
                                    <h1 class="font-poppins text-lg sml:text-3xl">Detail tugas</h1>
                                </div>
                                <div class="flex gap-2">
                                    <a class=" text-white" href="{{route('dosen.matakuliah.material.tugas.edit.{id}', $id)}}">
                                        <div class="flex p-0 rounded-full items-center">
                                            <span class="rounded-full bg-[#D1E3E2] hover:bg-[#ACCAC8]  p-2">
                                                <svg class="text-black"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                            </span>
                                            {{-- <p class="font-medium text-white">Tambah tugas</p> --}}
                                        </div>
                                    </a>
                                    <button wire:click="destroy({{$id}})">
                                        <div class="flex bg-[#000] p-0 rounded-full items-center">
                                            <span class="rounded-full bg-gray-700 hover:bg-black transition duration-300 p-1">
                                                <svg  class="text-white" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                            </span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-5">
                                @foreach ($assignments as $i => $assignment)
                                <div class="flex flex-col justify-between gap-8 p-6 rounded-2xl bg-[#D1E3E2] transition duration-75">
                                    
                                    <div class="flex md:flex-row sm:flex-col sm:gap-4 justify-between items-center">
                                        <div class="flex gap-4 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-folder-open"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 19l2.757 -7.351a1 1 0 0 1 .936 -.649h12.307a1 1 0 0 1 .986 1.164l-.996 5.211a2 2 0 0 1 -1.964 1.625h-14.026a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2h4l3 3h7a2 2 0 0 1 2 2v2" /></svg>
                                            <h1 class="text-2xl font-poppins">{{$assignment->nama_tugas}}</h1>
                                        </div>
                                        <div>
                                            <a href="{{ asset('storage/' . $assignment->file) }}"  class="px-3 py-2 rounded-full bg-white text-gray-900" target="_blank">Unduh materi</a>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-5 overflow-hidden mx-2">
                                        <div>
                                            Rincian tugas :
                                            <p class="font-poppins text-lg">{{$assignment->deskripsi}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="mt-4">
                                <h1 class="font-poppins text-lg sml:text-3xl">List pengumbulan tugas</h1>
                            </div>
                            <div class="mx-4">
                                <input class="w-full rounded-2xl py-2 px-4 mb-4" type="text" id="" wire:model="search" placeholder="Cari nama mahasiswa">
                            </div>
                            
                            <div class="grid grid-cols-3 gap-4 mb-6 w-full">
                                @foreach ($submissions as $i => $submission)
                                    <div class="p-5 h-full rounded-3xl bg-[#D1E3E2] hover:bg-[#ACCAC8]  transition duration-500 ">
                                        <div class="flex flex-col gap-4">
                                            <div class="flex justify-between items-start gap-4">
                                                <div class="flex flex-col gap-2 text-gray-900">
                                                    <h2 class=" font-medium text-xl font-poppins leading-4">{{ $submission->student->name }}</h2>
                                                    {{\Carbon\Carbon::setLocale('id');}}
                                                    <p class="font-poppins text-gray-900 text-sm italic ">Dikumpulkan pada : {{ \Carbon\Carbon::parse($submission->created_at)->translatedFormat('l, j F') }}</p>
                                                </div>
                                                <div>
                                                    <p class="font-poppins font-medium text-gray-900 text-sm  p-2 rounded-lg bg-white">
                                                        @if ($submission->nilai == 0)
                                                            -
                                                        @endif
                                                        {{$submission->nilai}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank">
                                                        <div class="h-full flex justify-end items-center gap-2">
                                                            <div class="flex gap-2 bg-[#000] p-1 pr-4 rounded-full items-center">
                                                                <span class="rounded-full bg-gray-700 p-1">
                                                                    <svg  class="text-white" xmlns="http://www.w3.org/2000/svg"  width="19"  height="19"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-text"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12h6" /><path d="M9 16h6" /></svg>
                                                                </span>
                                                                <p class="font-medium text-white">Lihat tugas</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <a href="{{route('dosen.matakuliah.material.tugas.nilai.{id}', $submission->id)}}">
                                                    <div class="flex gap-2 bg-[#fff] p-1 pr-4 rounded-full items-center">
                                                        <span class="rounded-full bg-[#f3f3f3] p-1">
                                                            <svg class="text-[#F2BE1C]"  xmlns="http://www.w3.org/2000/svg"  width="19"  height="19"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-star"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /></svg>
                                                        </span>
                                                        <p class="font-medium text-gray-900">Beri nilai</p>
                                                    </div>
                                                </a>
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
