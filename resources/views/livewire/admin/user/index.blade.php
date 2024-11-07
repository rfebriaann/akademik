{{-- <div>
    <div class="flex h-full my-10  gap-10">
        <div class="w-full p-10 bg-[#EC6A84] rounded-2xl">
            <div class="flex flex-col gap-4">
                <div class="flex justify-between">
                    <div>
                        <h1 class="font-poppins font-semibold text-3xl text-white">Manajemen Pengguna</h1>
                    </div>
                    <div>
                        <a href="">
                            <div class="flex gap-2 bg-[#fff] p-1 pr-4 rounded-full items-center">
                                <span class="rounded-full bg-[#F67992] p-1">
                                    <svg class="text-white"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M9 12h6" /><path d="M12 9v6" /></svg>
                                </span>
                                <p class="font-poppins font-medium text-gray-900">Tambah mata kuliah</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="p-6 w-full bg-white rounded-2xl">
                    <div class="relative overflow-x-auto rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-white">
                            <thead class="text-xs text-white uppercase bg-[#F57E95] text-center">
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-10 py-3">
                                        Nama Pengguna
                                    </th>
                                    <th scope="col" class="px-20 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-20 py-3">
                                        Jenis
                                    </th>
                                    <th scope="col" class="px-20 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $i => $user)
                                    <tr class="odd:bg-[#E4E7F1] even:bg-[#fefefe] border-b border-white/20 text-gray-900">
                                        <td class="px-4 py-4">
                                            {{ $i + 1 }}
                                        </td>
                                        <th scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $user->name }}
                                        </th>
                                        <td class="px-20 py-4 text-gray-900">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-20 py-4 text-gray-900">
                                            @foreach ($user->getRoleNames() as $role)
                                                {{ $role }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="flex items-center">
                                                <div>
                                                    <a href="{{route('admin.user.edit.{id}', $user->id)}}" class="block px-4 py-2 text-gray-900">Edit Data</a>
                                                </div>
                                                <div>
                                                    <button wire:click="destroy({{$user->id}})">Hapus 🗑️</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container mx-auto px-4">
    <div class="my-10">
        <div class="flex flex-col lg:flex-row gap-10 lg:justify-center">
            <!-- Left Section (Main Content) -->
            <div class="w-full ">
                <div class="flex flex-col gap-7 justify-center">
                    <div class="w-full sml:w-3/4 h-24">
                        <h4 class="font-poppins text-xl sml:text-2xl">👋 Selamat datang kembali,</h4>
                        <h1 class="font-poppins text-3xl sml:text-5xl font-medium">{{$name}}</h1>
                    </div>
                    <div class="w-full rounded-2xl overflow-hidden">
                        <div class="flex flex-col gap-4">
                            <div>
                                <h1 class="font-poppins text-lg sml:text-xl">Daftar pengguna</h1>
                            </div>
                            <div class="mx-4">
                                <input class="w-full rounded-2xl py-2 px-4 mb-4" type="text" id="" wire:model.live="search_matkul" placeholder="Cari pengguna">
                            </div>
                            <div class="relative overflow-x-auto rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-white">
                                    <thead class="text-xs text-white uppercase bg-[#F57E95] text-center">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">
                                                #
                                            </th>
                                            <th scope="col" class="px-10 py-3">
                                                Nama Pengguna
                                            </th>
                                            <th scope="col" class="px-20 py-3">
                                                Email
                                            </th>
                                            <th scope="col" class="px-20 py-3">
                                                Jenis
                                            </th>
                                            <th scope="col" class="px-20 py-3">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $index => $user)
                                            <tr class="odd:bg-[#E4E7F1] even:bg-[#fefefe] border-b border-white/20 text-gray-900">
                                                <td class="px-4 py-4">
                                                    {{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}
                                                </td>
                                                <th scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $user->name }}
                                                </th>
                                                <td class="px-20 py-4 text-gray-900">
                                                    {{ $user->email }}
                                                </td>
                                                <td class="px-20 py-4 text-gray-900">
                                                    @foreach ($user->getRoleNames() as $role)
                                                        {{ $role }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="flex items-center">
                                                        <div>
                                                            <a href="{{route('admin.user.edit.{id}', $user->id)}}" class="block px-4 py-2 text-gray-900">Edit Data</a>
                                                        </div>
                                                        <div>
                                                            <button wire:click="destroy({{$user->id}})">Hapus 🗑️</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
