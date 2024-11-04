<div>
    <!-- Menampilkan pesan sukses jika ada -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Menampilkan error validasi jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk input data course -->
    <form wire:submit.prevent="createCourse">
        <div class="mb-3">
            <label for="nama_mata_kuliah" class="form-label">Nama Mata Kuliah</label>
            <input type="text" wire:model="nama_mata_kuliah" class="form-control" id="nama_mata_kuliah" required>
        </div>

        <div class="mb-3">
            <label for="kode_mata_kuliah" class="form-label">Kode Mata Kuliah</label>
            <input type="text" wire:model="kode_mata_kuliah" class="form-control" id="kode_mata_kuliah" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea wire:model="deskripsi" class="form-control" id="deskripsi"></textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" wire:model="tanggal_mulai" class="form-control" id="tanggal_mulai" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" wire:model="tanggal_selesai" class="form-control" id="tanggal_selesai" required>
        </div>

        <button type="submit" class="btn btn-primary">Buat Mata Kuliah</button>
    </form>
</div>
