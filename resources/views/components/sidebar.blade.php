{{-- <div class="mx-10">
    <div>
        <aside id="sidebar" class="fixed inset-y-0 left-0 top-1/2 transform -translate-y-1/2 z-40 w-[140px] p-10" aria-label="Sidebar">
            
            <!-- Sidebar for Admin -->
            @role('Admin')
                <div class="bg-[#F796A9] flex flex-col justify-around items-center rounded-[40px] w-full py-4 overflow-y-auto">
            @endrole

            <!-- Sidebar for Dosen -->
            @role('Dosen')
                <div class="bg-[#D1E3E2] flex flex-col justify-around items-center rounded-[40px] w-full py-4 overflow-y-auto">
            @endrole

            <!-- Sidebar for Mahasiswa -->
            @role('Mahasiswa')
                <div class="bg-[#F3EBE5] flex flex-col justify-around items-center rounded-[40px] w-full py-4 overflow-y-auto">
            @endrole

                <div>
                    <ul class="space-y-5 font-medium">
                        <!-- Admin Specific Links -->
                        @role('Admin')
                            <li>
                                <a href="{{ route('admin.user.index') }}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                    <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Pengguna</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z"/>
                                        <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.course.index') }}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                    <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Mata Kuliah</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M8 22a1 1 0 0 1 0 -2h.616l.25 -2h-4.866a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h16a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-4.867l.25 2h.617a1 1 0 0 1 0 2zm5.116 -4h-2.233l-.25 2h2.733z"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.material.index') }}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                    <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Materi kuliah</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 6a4 4 0 0 1 4 4v11a1 1 0 0 1 -1.514 .857l-4.486 -2.691l-4.486 2.691a1 1 0 0 1 -1.508 -.743l-.006 -.114v-11a4 4 0 0 1 4 -4h4z"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.assignment.index') }}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                    <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Tugas</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 2l.117 .007a1 1 0 0 1 .876 .876l.007 .117v4l.005 .15a2 2 0 0 0 1.838 1.844l.157 .006h4l.117 .007a1 1 0 0 1 .876 .876l.007 .117v9a3 3 0 0 1 -2.824 2.995l-.176 .005h-10a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005h5z"/>
                                    </svg>
                                </a>
                            </li>
                        @endrole

                        <!-- Dosen Specific Links -->
                        @role('Dosen')
                            <li>
                                <a href="{{ route('dosen.matakuliah.index') }}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                    <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Mata Kuliah</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M7 21a1 1 0 0 1 0 -2h1v-2h-4a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h16a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-4v2h1a1 1 0 0 1 0 2zm7 -4h-4v2h4z"/>
                                    </svg>
                                </a>
                            </li>
                        @endrole

                        <!-- Mahasiswa Specific Links -->
                        @role('Mahasiswa')
                            <li>
                                <a href="{{ route('mahasiswa.kelas.index') }}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                    <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Kelas</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 6a4 4 0 0 1 4 4v11a1 1 0 0 1 -1.514 .857l-4.486 -2.691l-4.486 2.691a1 1 0 0 1 -1.508 -.743l-.006 -.114v-11a4 4 0 0 1 4 -4h4z"/>
                                    </svg>
                                </a>
                            </li>
                        @endrole
                    </ul>
                </div>
            </div>
        </aside>
    </div>
</div> --}}

<div class="mx-10">
    <!-- Sidebar for Larger Screens -->
    <div class="hidden md:block">
        <aside id="sidebar" class="fixed inset-y-0 left-0 top-1/2 transform -translate-y-1/2 z-40 w-[140px] p-10" aria-label="Sidebar">
            
            <!-- Sidebar for Admin -->
            @role('Admin')
                <div class="bg-[#F796A9] flex flex-col justify-around items-center rounded-[40px] w-full py-4 overflow-y-auto">
            @endrole

            <!-- Sidebar for Dosen -->
            @role('Dosen')
                <div class="bg-[#D1E3E2] flex flex-col justify-around items-center rounded-[40px] w-full py-4 overflow-y-auto">
            @endrole

            <!-- Sidebar for Mahasiswa -->
            @role('Mahasiswa')
                <div class="bg-[#F3EBE5] flex flex-col justify-around items-center rounded-[40px] w-full py-4 overflow-y-auto">
            @endrole

                <div>
                    <ul class="space-y-5 font-medium">
                        <!-- Admin Specific Links -->
                        @role('Admin')
                            <li>
                                <a href="{{ route('admin.user.index') }}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                    <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Pengguna</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z"/>
                                        <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.course.index') }}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                    <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Mata Kuliah</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M8 22a1 1 0 0 1 0 -2h.616l.25 -2h-4.866a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h16a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-4.867l.25 2h.617a1 1 0 0 1 0 2zm5.116 -4h-2.233l-.25 2h2.733z"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.material.index') }}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                    <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Materi kuliah</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 6a4 4 0 0 1 4 4v11a1 1 0 0 1 -1.514 .857l-4.486 -2.691l-4.486 2.691a1 1 0 0 1 -1.508 -.743l-.006 -.114v-11a4 4 0 0 1 4 -4h4z"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.assignment.index') }}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                    <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Tugas</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 2l.117 .007a1 1 0 0 1 .876 .876l.007 .117v4l.005 .15a2 2 0 0 0 1.838 1.844l.157 .006h4l.117 .007a1 1 0 0 1 .876 .876l.007 .117v9a3 3 0 0 1 -2.824 2.995l-.176 .005h-10a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005h5z"/>
                                    </svg>
                                </a>
                            </li>
                        @endrole

                        <!-- Dosen Specific Links -->
                        @role('Dosen')
                            <li>
                                <a href="{{ route('dosen.matakuliah.index') }}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                    <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Mata Kuliah</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M7 21a1 1 0 0 1 0 -2h1v-2h-4a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h16a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-4v2h1a1 1 0 0 1 0 2zm7 -4h-4v2h4z"/>
                                    </svg>
                                </a>
                            </li>
                        @endrole

                        <!-- Mahasiswa Specific Links -->
                        @role('Mahasiswa')
                            <li>
                                <a href="{{ route('mahasiswa.kelas.index') }}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                    <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Kelas</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 6a4 4 0 0 1 4 4v11a1 1 0 0 1 -1.514 .857l-4.486 -2.691l-4.486 2.691a1 1 0 0 1 -1.508 -.743l-.006 -.114v-11a4 4 0 0 1 4 -4h4z"/>
                                    </svg>
                                </a>
                            </li>
                        @endrole
                        <li>
                            <a href="{{route('logout')}}" class="has-tooltip flex items-center p-2 hover:text-white rounded-lg hover:bg-red-400 hover:rounded-full group">
                                <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Keluar</span>
                                <svg  xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="3"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-logout"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>

    <!-- Bottom Navigation for Mobile Screens -->
    @role('Admin')
    <div class="fixed mx-4 bottom-1 inset-x-0 z-40 flex justify-around bg-[#F796A9] p-2 md:hidden rounded-full">
    @endrole
    @role('Dosen')
    <div class="fixed mx-4 bottom-1 inset-x-0 z-40 flex justify-around bg-[#D1E3E2] p-2 md:hidden rounded-full">
    @endrole
    @role('Mahasiswa')
    <div class="fixed mx-4 bottom-1 inset-x-0 z-40 flex justify-around bg-[#000] p-2 md:hidden rounded-full">
    @endrole
        <!-- Admin Navigation Links -->
        @role('Admin')
        <a href="{{ route('admin.user.index') }}" class="flex flex-col items-center text-white hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z"/>
                <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z"/>
            </svg>
            <span class="text-xs">Pengguna</span>
        </a>
        <a href="{{ route('admin.course.index') }}" class="flex flex-col items-center text-white hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M8 22a1 1 0 0 1 0 -2h.616l.25 -2h-4.866a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h16a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-4.867l.25 2h.617a1 1 0 0 1 0 2zm5.116 -4h-2.233l-.25 2h2.733z"/>
            </svg>
            <span class="text-xs">Matkul</span>
        </a>
        <a href="{{ route('admin.material.index') }}" class="flex flex-col items-center text-white hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 6a4 4 0 0 1 4 4v11a1 1 0 0 1 -1.514 .857l-4.486 -2.691l-4.486 2.691a1 1 0 0 1 -1.508 -.743l-.006 -.114v-11a4 4 0 0 1 4 -4h4z"/>
            </svg>
            <span class="text-xs">Materi</span>
        </a>
        <a href="{{ route('admin.assignment.index') }}" class="flex flex-col items-center text-white hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 2l.117 .007a1 1 0 0 1 .876 .876l.007 .117v4l.005 .15a2 2 0 0 0 1.838 1.844l.157 .006h4l.117 .007a1 1 0 0 1 .876 .876l.007 .117v9a3 3 0 0 1 -2.824 2.995l-.176 .005h-10a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005h5z"/>
            </svg>
            <span class="text-xs">Tugas</span>
        </a>
        
        <!-- Add other links here -->
        @endrole

        <!-- Dosen Navigation Links -->
        @role('Dosen')
        <a href="{{ route('dosen.matakuliah.index') }}" class="flex flex-col items-center text-gray-900 hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M7 21a1 1 0 0 1 0 -2h1v-2h-4a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h16a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-4v2h1a1 1 0 0 1 0 2zm7 -4h-4v2h4z"/>
            </svg>
            <span class="text-xs">Mata Kuliah</span>
        </a>
        @endrole

        <!-- Mahasiswa Navigation Links -->
        @role('Mahasiswa')
        <a href="{{ route('mahasiswa.kelas.index') }}" class="flex flex-col items-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 6a4 4 0 0 1 4 4v11a1 1 0 0 1 -1.514 .857l-4.486 -2.691l-4.486 2.691a1 1 0 0 1 -1.508 -.743l-.006 -.114v-11a4 4 0 0 1 4 -4h4z"/>
            </svg>
            <span class="text-xs">Kelas</span>
        </a>
        @endrole
        <a href="{{route('logout')}}" class="flex flex-col items-center text-white">
            <svg class="w-6 h-6"  xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-logout"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg>
            <span class="text-xs">Keluar</span>
        </a>
    </div>
</div>



