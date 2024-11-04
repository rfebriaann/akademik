<div class="max-w-md mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-6 text-center">Login</h2>

    <form wire:submit.prevent="login">
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input wire:model="email" type="email" id="email" class="mt-1 p-2 block w-full border rounded-md" required>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input wire:model="password" type="password" id="password" class="mt-1 p-2 block w-full border rounded-md" required>
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-between mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Login
            </button>
        </div>
    </form>
</div>
