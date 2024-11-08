<div class="container mx-auto px-4">
    <div class="my-10">
        <div class="flex flex-col gap-10 lg:flex-row lg:justify-center">
            <!-- Left Section (Main Content) -->
            <div class="w-full">
                <div class="flex flex-col gap-7">
                    <!-- Welcome Section -->
                    <div class="w-full lg:w-3/4 h-24 text-center lg:text-left">
                        <h4 class="font-poppins text-xl lg:text-2xl">👋 Selamat datang kembali,</h4>
                        <h1 class="font-poppins text-3xl lg:text-5xl font-medium">{{$name}}</h1>
                    </div>

                    <!-- User Management Section -->
                    <div class="w-full rounded-2xl overflow-hidden">
                        <div class="flex flex-col gap-4">
                            <div class="flex justify-between items-center">
                                <h1 class="font-poppins text-lg lg:text-xl">Daftar Pengguna</h1>
                                <a href="{{route('admin.user.create')}}">
                                    <div class="flex gap-2 bg-[#EC6A84] hover:bg-[#F796A9] transition duration-300 p-1 pr-4 rounded-full items-center">
                                        <span class="rounded-full bg-[#F397A8] p-1">
                                            <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"/><path d="M9 12h6"/><path d="M12 9v6"/></svg>
                                        </span>
                                        <p class="font-poppins font-medium text-white">Tambah Pengguna</p>
                                    </div>
                                </a>
                            </div>

                            <!-- Search Box -->
                            <div class="mx-4">
                                <input class="w-full rounded-2xl py-2 px-4 mb-4" type="text" id="" wire:model.live="search" placeholder="Cari Pengguna">
                            </div>

                            <!-- Table Section -->
                            <div class="relative overflow-x-auto rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-900">
                                    <thead class="text-xs text-white uppercase bg-[#F57E95] text-center">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">#</th>
                                            <th scope="col" class="px-6 lg:px-10 py-3">Nama Pengguna</th>
                                            <th scope="col" class="px-10 lg:px-20 py-3">Email</th>
                                            <th scope="col" class="px-10 lg:px-20 py-3">Username</th>
                                            <th scope="col" class="px-10 lg:px-20 py-3">Jenis</th>
                                            <th scope="col" class="px-10 lg:px-20 py-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $index => $user)
                                            <tr class="odd:bg-[#E4E7F1] even:bg-[#fefefe] border-b border-white/20">
                                                <td class="px-4 py-4">{{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}</td>
                                                <th scope="row" class="px-6 lg:px-10 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $user->name }}
                                                </th>
                                                <td class="px-10 lg:px-20 py-4 text-gray-900">{{ $user->email }}</td>
                                                <td class="px-10 lg:px-20 py-4 text-gray-900">{{ $user->username }}</td>
                                                <td class="px-10 lg:px-20 py-4 text-gray-900">
                                                    @foreach ($user->getRoleNames() as $role)
                                                        {{ $role }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="flex flex-col sm:flex-row items-center gap-2">
                                                        <a href="{{route('admin.user.edit.{id}', $user->id)}}" class="px-4 py-2 text-gray-900">Edit</a>
                                                        <button wire:click="destroy({{$user->id}})" class="px-4 py-2 text-red-600">Hapus 🗑️</button>
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
                <div class="flex gap-10 mt-4 mb-20">
                    {{ $users->links() }}
            </div>
            </div>
        </div>
    </div>
</div>
