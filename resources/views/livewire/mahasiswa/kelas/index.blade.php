
    {{-- <form wire:submit.prevent="joinCourse">
        <label for="course_code">Kode Mata Kuliah:</label>
        <input type="text" id="course_code" wire:model="course_code">

        <button type="submit">Gabung</button>
    </form> --}}

    {{-- @if (session()->has('message'))
        <div class="alert">{{ session('message') }}</div>
    @endif

    <h2>Mata Kuliah yang Diikuti</h2>
    <ul>
        @foreach($courses as $course)
            <li>{{ $course->nama_mata_kuliah }}</li>
        @endforeach
    </ul> --}}
    <div class="">
        <div class="h-full w-auto my-10">
            <div class="flex gap-10 w-full justify-center ">
                <div class="basis-2/3">
                    <div class="flex flex-col gap-4 justify-center">
                        <form wire:submit.prevent="joinCourse">
                            <div class="flex justify-center items-center gap-4 w-full py-4 px-8 bg-white rounded-2xl overflow-hidden">
                                <div class="basis-3/4 w-full ">
                                    <input class="w-full rounded-2xl border-2 border-pink-600 py-1.5 px-4" type="text" id="course_code" wire:model="course_code" placeholder="Masukkan token kelas">
                                    @if (session()->has('message'))
                                        <div class="alert text-sm text-red-400 font-poppins mx-4 m-2">{{ session('message') }}</div>
                                    @endif
                                </div>
                                <div class="basis-1/4 w-full">
                                    <button class="bg-[#DA569E] w-full font-poppins text-sm font-medium text-white shadow-md shadow-pink-300 hover:bg-[#e963ad] rounded-2xl px-3 py-2.5">Tambah Kelas</button>
                                </div>
                            </div>
                        </form>
                        <div class="w-full p-10 bg-white rounded-2xl overflow-hidden">
                            <div class="flex flex-col gap-4 w-full ">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h1 class="font-poppins font-semibold text-xl">Daftar Kelas</h1>
                                    </div>
                                    {{-- <div>
                                        <a href="{{route('dosen.matakuliah.create')}}" class="bg-[#DA569E] font-poppins text-sm font-medium text-white shadow-md shadow-pink-300 hover:bg-[#e963ad] rounded-2xl px-3 py-2">Masukkan kode kelas</a>
                                    </div> --}}
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam doloremque reiciendis debitis veritatis quaerat porro doloribus, impedit qui quibusdam quo.</p>
                                <div class="h-64 overflow-scroll">
                                    <div class="flex flex-wrap gap-4 justify-center items-center w-full">
                                        @foreach ($courses as $course)
                                            <div class="w-full bg-[#f3f3f3] rounded-2xl border h-20">
                                                <div class="flex h-full justify-between items-center mx-10">
                                                    <div class="flex flex-col">
                                                        <h1 class="font-poppins font-medium text-md">{{$course->nama_mata_kuliah}}</h1>
                                                        <p class="font-poppins font-light text-sm">{{$course->deskripsi}}</p>
                                                    </div>
                                                    <div class="flex w-1/3 h-full justify-end items-center gap-4">
                                                        <span class="flex w-10 h-10 items-center justify-center text-center rounded-full bg-yellow-400 text-lg font-poppins font-medium text-white">
                                                            R
                                                        </span>
                                                        <p class="font-poppins font-normal text-sm">{{$course->dosen->name}}</p>
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
                <div class="basis-1/3">
                    <div class="flex flex-col gap-10 justify-center">
                        <div class="w-full p-10 bg-white rounded-2xl overflow-hidden">
                            <div class="flex flex-col gap-4 w-full">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h1 class="font-poppins font-semibold text-xl">Tugas hari ini</h1>
                                    </div>
                                    {{-- <div>
                                        <a href="{{route('dosen.matakuliah.create')}}" class="bg-[#DA569E] font-poppins text-sm font-medium text-white shadow-md shadow-pink-300 hover:bg-[#e963ad] rounded-2xl px-3 py-2">Tambah Mata Kuliah</a>
                                    </div> --}}
                                </div>
                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam doloremque reiciendis debitis veritatis quaerat porro doloribus, impedit qui quibusdam quo.</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
