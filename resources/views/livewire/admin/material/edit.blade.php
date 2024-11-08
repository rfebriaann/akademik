<div>
    <div class="flex flex-col h-full my-10 gap-10 px-4 md:flex-row md:px-0">
        <div class="w-full p-6 md:p-10 bg-white rounded-2xl">
            <div class="flex flex-col gap-4">
                <section class="mt-4">
                    <div class="max-w-screen-xl mx-auto">
                        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                            {{-- <a href="{{route('admin.material.index')}}">
                                <div class="bg-[#f3f3f3] w-10 h-10 md:w-12 md:h-12 rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:w-8 md:h-8 text-gray-900 transition duration-75 group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M15 6l-6 6l6 6" />
                                    </svg>
                                </div>
                            </a> --}}
                            <h1 class="text-xl md:text-2xl font-semibold mt-2 md:mt-0">Edit materi</h1>
                        </div>
                        <div class="bg-white w-full relative sm:rounded-lg overflow-hidden">
                            <form action="" wire:submit.prevent="update" class="space-y-6">
                                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                                    <!-- Title Section -->
                                    <div class="space-y-1">
                                        <label for="nama" class="font-medium text-gray-800">Judul materi<span class="text-red-600">*</span></label>
                                        <p class="text-sm text-gray-600">Edit nama judul materi</p>
                                    </div>
                                    <div>
                                        <input id="nama" type="text" class="w-full border border-gray-300 p-2 md:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]" wire:model="material_name" wire:loading.attr="disabled">
                                        @error('material_name')
                                            <span class="block mt-1 text-xs text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- File Section -->
                                    <div class="space-y-1">
                                        <label for="file" class="font-medium text-gray-800">File <span class="text-red-600">*</span></label>
                                        <p class="text-sm text-gray-600">Edit file materi kuliah</p>
                                    </div>
                                    <div>
                                        <input type="file" id="file" class="w-full border border-gray-300 p-2 md:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[40px]" wire:model="file" wire:loading.attr="disabled">
                                        @error('file')
                                            <span class="block mt-1 text-xs text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Course Section -->
                                    <div class="space-y-1">
                                        <label for="course" class="font-medium text-gray-800">Mata kuliah <span class="text-red-600">*</span></label>
                                        <p class="text-sm text-gray-600">Edit mata kuliah</p>
                                    </div>
                                    <div>
                                        <select class="w-full border border-gray-300 p-2 md:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]" wire:model="course_id">
                                            <option value="">Pilih mata kuliah</option>
                                            @foreach($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->nama_mata_kuliah }}</option>
                                            @endforeach
                                        </select>
                                        @error('course_id')
                                            <span class="block mt-1 text-xs text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Lecturer Section -->
                                    <div class="space-y-1">
                                        <label for="lecturer" class="font-medium text-gray-800">Dosen pembuat materi <span class="text-red-600">*</span></label>
                                        <p class="text-sm text-gray-600">Edit dosen pembuat materi</p>
                                    </div>
                                    <div>
                                        <select class="w-full border border-gray-300 p-2 md:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]" wire:model="uploaded_by">
                                            <option value="">Pilih dosen</option>
                                            @foreach($dosens as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('uploaded_by')
                                            <span class="block mt-1 text-xs text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Hidden Inputs -->
                                <input type="hidden" wire:model="kode_mata_kuliah">
                                <input type="hidden" wire:model="dosen_id">

                                <!-- Submit Button -->
                                <div class="flex justify-end">
                                    <button type="submit" class="w-full md:w-28 rounded-xl p-3 bg-[#0365FE] text-lg text-white hover:bg-[#2678fc]">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
