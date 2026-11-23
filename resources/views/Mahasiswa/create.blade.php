<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Data Mahasiswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Form Tambah Mahasiswa -->
                    <form action="{{ route('mahasiswa.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label>Gambar Mahasiswa</label>
                            <input type="file" name="image" accept="image/*" class="w-full border rounded p-2">
                            @error('image')<small class="text-red-600">{{ $message}}</small> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700 mb-1">NIM</label>
                            <input type="text" name="nim" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700 mb-1">Nama Mahasiswa</label>
                            <input type="text" name="nama_mahasiswa" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700 mb-1">Alamat</label>
                            <textarea name="alamat" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4 space-x-3">
                            <a href="{{ route('mahasiswa.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded-lg shadow">
                                Batal
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow">
                                Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout> 