<div class="container mx-auto px-4">
    <div class="flex flex-col lg:flex-row h-full my-10 gap-10">
        <div class="w-full lg:w-3/4 p-6 lg:p-10 bg-white rounded-2xl shadow-lg">
            <div class="flex flex-col gap-4">
                <section class="mt-4">
                    <div class="max-w-screen-xl p-2 mx-auto lg:px-1">
                        <div class="flex justify-between items-center">
                            <a href="{{ route('admin.material.index') }}">
                                <div class="bg-[#f3f3f3] w-10 lg:w-12 rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 lg:w-8 lg:h-8 text-gray-900 transition duration-75 group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M15 6l-6 6l6 6" />
                                    </svg>
                                </div>
                            </a>
                            <h1 class="font-poppins font-semibold text-xl lg:text-2xl">Edit Materi</h1>
                        </div>
                        <div class="bg-white w-full relative sm:rounded-lg overflow-hidden mt-8 lg:mt-10">
                            <div class="overflow-x-auto">
                                <form action="" wire:submit.prevent="submit">
                                    <div class="space-y-6">
                                        <!-- Material Title -->
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="nama" class="font-medium text-gray-800">Judul Materi <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Edit nama judul materi</p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input id="nama" type="text" class="w-full border border-gray-300 p-2 lg:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]" wire:model="material_name" name="nama" wire:loading.attr="disabled">
                                                @error('material_name')
                                                    <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- File Upload -->
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="file" class="font-medium text-gray-800">File <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Edit file materi kuliah</p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <input type="file" id="file" name="file" class="w-full border border-gray-300 p-2 lg:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[40px]" wire:model="file" wire:loading.attr="disabled">
                                                @error('file')
                                                    <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Course Selection -->
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="course_id" class="font-medium text-gray-800">Mata Kuliah <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Edit mata kuliah</p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <select id="course_id" class="w-full border border-gray-300 p-2 lg:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]" wire:model="course_id">
                                                    <option value="">Pilih mata kuliah</option>
                                                    @foreach($courses as $course)
                                                        <option value="{{ $course->id }}">{{ $course->nama_mata_kuliah }}</option>
                                                    @endforeach
                                                </select>
                                                @error('course_id')
                                                    <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Lecturer Selection -->
                                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-10">
                                            <div class="space-y-1">
                                                <label for="uploaded_by" class="font-medium text-gray-800">Dosen Pembuat Materi <span class="text-red-600">*</span></label>
                                                <p class="text-sm text-gray-600">Edit dosen pembuat materi</p>
                                            </div>
                                            <div class="pt-0 lg:pt-3">
                                                <select id="uploaded_by" class="w-full border border-gray-300 p-2 lg:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]" wire:model="uploaded_by">
                                                    <option value="">Pilih dosen</option>
                                                    @foreach($dosens as $id => $name)
                                                        <option value="{{ $id }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('uploaded_by')
                                                    <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Hidden Inputs -->
                                        <input type="hidden" wire:model="kode_mata_kuliah">
                                        <input type="hidden" wire:model="dosen_id">

                                        <!-- Submit Button -->
                                        <div class="flex justify-end mt-6">
                                            <button type="submit" class="w-full lg:w-28 rounded-xl p-3 bg-[#0365FE] text-lg text-white hover:bg-[#2678fc]">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
