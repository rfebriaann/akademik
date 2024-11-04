<div>
    <div class="flex h-full my-10 mx-40 gap-10">
        <div class="w-full p-10 bg-white rounded-2xl">
            <div class="flex flex-col gap-4">
                <div class="flex justify-between">
                    <div>
                        <h1 class="font-poppins font-semibold text-2xl">Manajemen Pengguna</h1>
                    </div>
                    <div>
                        <button class="bg-[#DA569E] font-poppins font-medium text-white shadow-md shadow-pink-300 hover:bg-[#e963ad] rounded-2xl px-3 py-2">Tambah Pengguna</button>
                    </div>
                </div>
                <div class="p-6 w-full bg-[#f4f4f4] rounded-2xl">
                    <div class="relative overflow-x-auto rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-white">
                            <thead class="text-xs text-white uppercase bg-[#303E59] text-center">
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
                                            {{-- {{$userrole = $user->getRoleNames();}} --}}
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
</div>
