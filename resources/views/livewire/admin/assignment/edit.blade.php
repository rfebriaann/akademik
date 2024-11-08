<div>
<div class="flex h-full my-10 gap-10">
    <div class="w-full p-10 bg-white rounded-2xl">
        <div class="flex flex-col gap-4">
            <section class="mt-4">
                <div class="max-w-screen-xl p-2 mx-auto lg:px-1">
                    <div class="flex flex-col sm:flex-row justify-between items-center">
                        {{-- <a href="{{route('admin.assignment.index')}}">
                            <div class="bg-[#f3f3f3] w-12 rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-900 transition duration-75 group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M15 6l-6 6l6 6" />
                                </svg>
                            </div>
                        </a> --}}
                        <div>
                            <h1 class="font-poppins font-semibold text-lg sm:text-xl md:text-2xl">Tambah Tugas</h1>
                        </div>
                    </div>
                    <div class="bg-white w-full relative sm:rounded-lg overflow-hidden mt-10">
                        <div class="overflow-x-auto">
                            <form action="" wire:submit="update">
                                <div class="space-y-6">
                                    <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-10">
                                        <div class="space-y-1">
                                            <label for="nama" class="font-medium text-gray-800">
                                                Nama Tugas <span class="text-red-600">*</span>
                                            </label>
                                            <p class="text-sm text-gray-600">
                                                Edit nama tugas anda
                                            </p>
                                        </div>
                                        <div class="pt-0 md:pt-3">
                                            <input id="nama_tugas" type="text" class="w-full border border-gray-300 p-3 md:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]" wire:model="nama_tugas" name="nama_tugas" wire:loading.attr="disabled">
                                            @error('nama_tugas')
                                            <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-10">
                                        <div class="space-y-1">
                                            <label for="detail" class="font-medium text-gray-800">
                                                Deskripsi <span class="text-red-600">*</span>
                                            </label>
                                            <p class="text-sm text-gray-600">
                                                Edit deskripsi tugas
                                            </p>
                                        </div>
                                        <div class="pt-0 md:pt-3">
                                            <input type="text" id="deskripsi" name="deskripsi" class="w-full border border-gray-300 p-3 md:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[40px]" wire:model="deskripsi" wire:loading.attr="disabled">
                                            @error('deskripsi')
                                            <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-10">
                                        <div class="space-y-1">
                                            <label for="nama" class="font-medium text-gray-800">
                                                Batas Waktu Tugas <span class="text-red-600">*</span>
                                            </label>
                                            <p class="text-sm text-gray-600">
                                                Edit batas waktu tugas
                                            </p>
                                        </div>
                                        <div class="pt-0 md:pt-3">
                                            <input type="date" id="batas_waktu" name="batas_waktu" class="w-full border border-gray-300 p-3 md:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[40px]" wire:model="batas_waktu" wire:loading.attr="disabled">
                                            @error('batas_waktu')
                                            <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-10">
                                        <div class="space-y-1">
                                            <label for="nama" class="font-medium text-gray-800">
                                                Tambahkan File Pendukung <span class="text-red-600">*</span>
                                            </label>
                                            <p class="text-sm text-gray-600">
                                                Edit file pendukung dari tugasnya
                                            </p>
                                        </div>
                                        <div class="pt-0 md:pt-3">
                                            <input type="file" id="file" name="file" class="w-full border border-gray-300 p-3 md:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[40px]" wire:model="file" wire:loading.attr="disabled">
                                            @error('file')
                                            <span class="block mt-0 text-xs text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-10">
                                        <div class="space-y-1">
                                            <label for="nama" class="font-medium text-gray-800">
                                                Mata Kuliah <span class="text-red-600">*</span>
                                            </label>
                                            <p class="text-sm text-gray-600">
                                                Edit mata kuliah
                                            </p>
                                        </div>
                                        <div class="pt-0 md:pt-3">
                                            <select class="w-full border border-gray-300 p-3 md:p-4 text-black rounded-md focus:border-gray-800 focus:ring-gray-800 disabled:bg-gray-50 min-h-[30px]" wire:model="course_id">
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

                                    <div class="flex justify-end">
                                        <button type="submit" class="w-28 rounded-xl p-3 bg-[#0365FE] text-lg text-white hover:bg-[#2678fc]">Simpan</button>
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

<style>
@media (min-width: 375px) {
    .sm\:text-xl { font-size: 1.25rem; } /* Small screens */
}

@media (min-width: 425px) {
    .sml\:text-lg { font-size: 1.125rem; } /* Small large screens */
}

@media (min-width: 768px) {
    .md\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .md\:p-4 { padding: 1rem; } /* Medium screens */
}

@media (min-width: 1024px) {
    .lg\:text-2xl { font-size: 1.5rem; } /* Large screens */
}

@media (min-width: 1280px) {
    .xl\:text-3xl { font-size: 1.875rem; } /* Extra-large screens */
}
</style>
</div>
