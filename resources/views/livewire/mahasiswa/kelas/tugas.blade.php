<div class="container mx-auto px-4">
    <div class="my-10">
        <div class="flex flex-col lg:flex-row gap-10 lg:justify-center w-full">
            <!-- Left Section (Main Content) -->
            <div class="w-full lg:basis-2/3">
                <div class="flex flex-col gap-7 justify-center w-full">
                    {{-- <div class="w-full sml:w-3/4 h-24">
                        <h4 class="font-poppins text-xl sml:text-2xl">👋 Selamat datang kembali,</h4>
                        <h1 class="font-poppins text-3xl sml:text-5xl font-medium">{{$name}}</h1>
                    </div> --}}
                    <div class="w-full my-10 rounded-2xl overflow-hidden">
                        <div class="flex flex-col gap-4">
                            <div>
                                <h1 class="font-poppins text-lg sml:text-xl lg:text-3xl">Daftar materi</h1>
                            </div>
                            <div class="mx-4">
                                <input class="w-full rounded-2xl py-2 px-4 mb-4" type="text" id="" wire:model="search_mata_kuliah" placeholder="Cari materi">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-5">
                                @foreach ($assignments as $i => $assignment)
                                    <div class="flex flex-col justify-between gap-8 p-6 rounded-2xl bg-[#FAE0C1] hover:bg-[#fcdcb5] transition duration-75">
                                        
                                        <div class="flex justify-between items-center">
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
                                                {{-- <p class="font-poppins text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab minus odit in, dolor rerum ullam veniam aliquid aliquam quaerat saepe quisquam error ipsa beatae eligendi, maiores culpa? Eligendi nobis laudantium esse facere, repellendus vel quos ex ducimus nisi voluptates blanditiis debitis! Ut nostrum similique sit ipsam, repellendus beatae quibusdam velit, consectetur fuga aliquam eius expedita totam eos dignissimos asperiores quia amet praesentium consequuntur facilis voluptas tempora ex ad? Adipisci, magnam veniam. Libero cupiditate ad quibusdam ea molestiae blanditiis corrupti assumenda?</p> --}}
                                            </div>
                                            {{-- <p class="font-poppins text-sm font-light">{{$course->deskripsi}}</p> --}}
                                            <p class="font-poppins font-medium text-sm">Dibuat oleh : {{$assignment->creator->name}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Section (Sidebar) -->
            <div class="w-full lg:basis-1/4">
                <div class="flex flex-col gap-4 h-full lg:h-full justify-center lg:fixed lg:-mt-10 lg:mx-10 ">
                    <!-- Daftar Tugas Section -->
                    <div class="h-1/3 flex w-full flex-col gap-4 p-6 bg-[#F2EAE5] rounded-2xl overflow-y-auto">
                        <h1 class="font-poppins font-semibold text-lg sml:text-xl">Pengumpulan tugas</h1>
                        <p class="text-sm">Unggah tugas yang telah selesai pengerjaannya</p>
                        {{-- <input class="w-full rounded-2xl py-1.5 px-4 mb-4" type="text" id="search" wire:model="search" placeholder="Cari judul tugas"> --}}
                        {{-- @dd($this->submission->nilai) --}}
                        <div class="flex flex-col gap-4">
                            {{-- @if ($this->submission->is_published == 1)
                                <span class="font-poppins px-3 py-2 font-medium text-center h-ful">
                                    Tugas anda telah dinilai
                                </span>
                            @else --}}
                                <form wire:submit.prevent="submitAssignment">
                                    <div class="flex items-center mb-3 bg-white px-2 py-2 rounded-xl">
                                        <input
                                            wire:model="file"
                                            type="file"
                                            class="text-md text-gray-900 font-poppins
                                            file:mr-5 file:py-2 file:px-3 file:border-[0px]
                                            file:text-xs file:font-medium
                                            file:bg-[#FAE0C1] file:hover:bg-[#fcdcb5] file:text-gray-900 file:font-poppins
                                            hover:file:cursor-pointer hover:file:bg-blue-50 file:rounded-xl
                                            "
                                        />
                                    </div>
                                    @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                                    <button type="submit" class="bg-[#000] w-full sml:w-auto font-poppins text-sm font-medium text-white hover:bg-[#252525] rounded-2xl px-3 py-2.5">Submit Tugas</button>
                                </form>
                            {{-- @endif --}}
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 p-6 bg-[#F2EAE5] rounded-2xl overflow-y-auto lg:h-2/5">
                        <h1 class="font-poppins font-semibold text-lg sml:text-xl">Tugas yang telah dikumpulkan</h1>
                        {{-- <input class="w-full rounded-2xl py-1.5 px-4 mb-4" type="text" id="search" wire:model="search" placeholder="Cari judul tugas"> --}}
                        <div class="flex flex-col gap-4">
                            @foreach ($submissions as $item)
                                <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank">
                                    <div class="flex flex-col justify-between gap-4 h-full">
                                        <div class="flex items-center justify-between p-4 rounded-2xl bg-[#FAE0C1] hover:bg-[#fcdcb5] transition duration-75">
                                            <div class="flex items-center gap-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-folder-open"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 19l2.757 -7.351a1 1 0 0 1 .936 -.649h12.307a1 1 0 0 1 .986 1.164l-.996 5.211a2 2 0 0 1 -1.964 1.625h-14.026a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2h4l3 3h7a2 2 0 0 1 2 2v2" /></svg>
                                                <div class="flex flex-col">
                                                    <p class="font-poppins">Lihat tugas</p>
                                                    <p class="font-poppins">{{$item->id}}</p>
                                                    {{-- <p class="font-poppins text-xs">{{$item->course->nama_mata_kuliah}}</p> --}}
                                                </div>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                                        </div>
                                        <div>
                                            <p class="font-poppins">Feedback tugas : </p>
                                            <p class="font-poppins">
                                                @if ($item->feedback == null)
                                                    Belum ada feedback
                                                @endif
                                                {{$item->feedback}}
                                            </p>
                                        </div>
                                        <div class="flex gap-4 items-center">
                                            <span>Nilai tugas anda : </span>
                                            <span class="font-poppins px-3 py-2 bg-white rounded-xl font-medium">
                                                @if ($item->nilai == null)
                                                    -
                                                @endif
                                                {{$item->nilai}}
                                            </span>
                                        </div>
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