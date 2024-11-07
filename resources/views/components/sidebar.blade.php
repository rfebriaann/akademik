<div class="mx-10">
    <div class="">
        <aside id="" class="fixed inset-y-0 left-0 top-1/2 transform -translate-y-1/2 z-40 w-[140px] p-10" aria-label="Sidebar">
            @role('Dosen')
                <div class="bg-[#D1E3E2] flex flex-col justify-around items-center rounded-[40px] w-full py-4 overflow-y-auto">
            @endrole
            @role('Mahasiswa')
                <div class="bg-[#F3EBE5] flex flex-col justify-around items-center rounded-[40px] w-full py-4 overflow-y-auto">
            @endrole
            @role('Admin')
                <div class="bg-[#F796A9] flex flex-col justify-around items-center rounded-[40px] w-full py-4 overflow-y-auto">
            @endrole
                <div>
                    <ul class="space-y-5 font-medium">
                        @role('Admin')
                        <li>
                            <a href="" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Dashboard</span>
                                <svg class="w-5 h-5 text-black transition duration-75 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                    <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                    <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.user.index')}}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Pengguna</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z"/>
                                    <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z"/>
                                </svg>
                            </a>
                        </li>
                        @endrole
                        @role('Dosen')
                        <li>
                            <a href="" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Mata Kuliah</span>
                                <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="currentColor"  class="w-5 h-5 text-black transition duration-75 group-hover:text-white"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 21a1 1 0 0 1 0 -2h1v-2h-4a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h16a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-4v2h1a1 1 0 0 1 0 2zm7 -4h-4v2h4z" /></svg>
                            </a>
                        </li>
                        @endrole
                        @role('Mahasiswa')
                        <li>
                            <a href="{{route('mahasiswa.kelas.index')}}" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Kelas</span>
                                <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="currentColor"  class="w-5 h-5 text-black transition duration-75 group-hover:text-white"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 6a4 4 0 0 1 4 4v11a1 1 0 0 1 -1.514 .857l-4.486 -2.691l-4.486 2.691a1 1 0 0 1 -1.508 -.743l-.006 -.114v-11a4 4 0 0 1 4 -4h4z" /><path d="M16 2a4 4 0 0 1 4 4v11a1 1 0 0 1 -2 0v-11a2 2 0 0 0 -2 -2h-5a1 1 0 0 1 0 -2h5z" /></svg>
                            </a>
                        </li>
                        @endrole
                        <li>
                            <a href="" class="has-tooltip flex items-center p-2 hover:text-white rounded-full bg-white hover:bg-[#000000] hover:rounded-full group">
                                <span class="tooltip rounded shadow-lg px-2 py-1 bg-black/85 ml-8">Manajemen Profil</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-black transition duration-75 group-hover:text-white">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z"/>
                                    <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z"/>
                                </svg>
                            </a>
                        </li>
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
</div>
