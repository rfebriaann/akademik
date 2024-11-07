<div class="container mx-auto px-4">
    <div class="my-10">
        <div class="flex flex-col lg:flex-row gap-10 lg:justify-center">
            <!-- Left Section (Main Content) -->
            <div class="w-full lg:basis-2/3">
                <div class="flex flex-col gap-7 justify-center">
                    <div class="w-full sml:w-3/4 h-24">
                        <h4 class="font-poppins text-xl sml:text-2xl">👋 Selamat datang kembali,</h4>
                        <h1 class="font-poppins text-3xl sml:text-5xl font-medium">{{$name}}</h1>
                    </div>
                    <div class="w-full rounded-2xl overflow-hidden">
                        <div class="flex flex-col gap-4">
                            <div>
                                <h1 class="font-poppins text-lg sml:text-xl">Daftar Kelas</h1>
                            </div>
                            <div class="mx-4">
                                <input class="w-full rounded-2xl py-2 px-4 mb-4" type="text" id="" wire:model.live="search_matkul" placeholder="Cari mata kuliah">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                @foreach ($courses as $course)
                                <a href="{{route('mahasiswa.kelas.{id}', $course->id)}}">
                                    <div class="flex flex-col justify-between p-6 h-36 rounded-2xl bg-[#FAE0C1] hover:bg-[#fcdcb5] transition duration-75">
                                        <div class="flex justify-between items-center">
                                            <div class="flex gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-signature"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17c3.333 -3.333 5 -6 5 -8c0 -3 -1 -3 -2 -3s-2.032 1.085 -2 3c.034 2.048 1.658 4.877 2.5 6c1.5 2 2.5 2.5 3.5 1l2 -3c.333 2.667 1.333 4 3 4c.53 0 2.639 -2 3 -2c.517 0 1.517 .667 3 2" /></svg>
                                                <p>{{$course->dosen->name}}</p>
                                            </div>
                                            <div>
                                                <p class="px-2 p-0.5 rounded-full bg-white text-gray-900">{{$course->kode_mata_kuliah}}</p>
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <p class="font-poppins text-lg font-medium">{{$course->nama_mata_kuliah}}</p>
                                            <p class="font-poppins text-sm font-light">{{$course->deskripsi}}</p>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Section (Sidebar) -->
            <div class="w-full lg:basis-1/4">
                <div class="flex flex-col gap-4 lg:h-full justify-center lg:fixed lg:-mt-10 lg:mx-10">
                    <!-- Input Kode Kelas Section -->
                    <div class="flex flex-col p-6 bg-[#F2EAE5] rounded-2xl">
                        <h1 class="font-poppins font-semibold text-lg sml:text-xl">Input Kode Kelas</h1>
                        <p class="text-sm">Input kode kelas yang telah dibagikan oleh dosen mata kuliah.</p>
                        <form wire:submit.prevent="joinCourse" class="flex flex-col sml:flex-row items-center gap-4 bg-[#F3EAE5] rounded-2xl p-4">
                            <input class="w-full sml:basis-3/4 rounded-2xl py-1.5 px-4" type="text" id="course_code" wire:model="course_code" placeholder="Masukkan token kelas">
                            <button class="bg-[#000] w-full sml:w-auto font-poppins text-sm font-medium text-white hover:bg-[#252525] rounded-2xl px-3 py-2.5">Submit</button>
                        </form>
                        @if (session()->has('message'))
                            <div class="alert text-sm text-gray-700 font-poppins mt-2">{{ session('message') }}</div>
                        @endif
                    </div>
                    <!-- Daftar Tugas Section -->
                    <div class="flex flex-col gap-4 p-6 bg-[#F2EAE5] rounded-2xl overflow-y-auto h-80 lg:h-3/5">
                        <h1 class="font-poppins font-semibold text-lg sml:text-xl">Daftar Tugas</h1>
                        <input class="w-full rounded-2xl py-1.5 px-4 mb-4" type="text" id="search" wire:model.live="search_tugas" placeholder="Cari judul tugas">
                        <div class="flex flex-col gap-4">
                            @foreach ($assignments as $item)
                                <a href="{{route('mahasiswa.kelas.tugas.{id}', $item->id)}}">
                                    <div class="flex items-center justify-between p-4 rounded-2xl bg-[#FAE0C1] hover:bg-[#fcdcb5] transition duration-75">
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
