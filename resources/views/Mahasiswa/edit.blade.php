{{-- resources/views/mahasiswa/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Mahasiswa</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label>NIM</label>
                    <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" class="w-full border rounded p-2">
                    @error('nim') <small class="text-red-600">{{ $message }}</small> @enderror
                </div>

                {{-- Input Gambar Mahasiswa sesuai slide --}}
                <div class="mb-4">
                    <label>Gambar Mahasiswa</label>
                    <input type="file" name="image" accept="image/*" class="w-full border rounded p-2">
                    @error('image')<small class="text-red-600">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label>Nama</label>
                    <input type="text" name="nama_mahasiswa" value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}" class="w-full border rounded p-2">
                    @error('nama_mahasiswa') <small class="text-red-600">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="{{ old('alamat', $mahasiswa->alamat) }}" class="w-full border rounded p-2">
                    @error('alamat') <small class="text-red-600">{{ $message }}</small> @enderror
                </div>

                <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('mahasiswa.index') }}" class="ml-2 text-gray-600">Batal</a>
            </form>
        </div>
    </div>
</x-app-layout>