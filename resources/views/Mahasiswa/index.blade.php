<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Mahasiswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Tombol Tambah Mahasiswa -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">
                            Data Mahasiswa
                        </h3>
                        <a href="{{ route('mahasiswa.create') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow">
                            + Tambah Mahasiswa
                        </a>
                    </div>

                    @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-200">
                            <tbody>
                                @forelse($mahasiswa as $row)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-2 border w-16 text-center">{{ $loop->iteration }}</td>
                                    <td class="p-2 border">{{ $row->nim }}</td>
                                    
                                    <!-- Kolom Gambar sesuai slide -->
                                    <td class="p-2 border text-center">
                                        @if($row->image)
                                            <img src="{{ asset('storage/' . $row->image) }}" width="80">
                                        @else
                                            <span>Tidak ada gambar</span>
                                        @endif
                                    </td>

                                    <td class="p-2 border">{{ $row->nama_mahasiswa }}</td>
                                    <td class="p-2 border">{{ $row->alamat ?? '-' }}</td>
                                    
                                    <!-- Kolom Tombol Aksi -->
                                    <td class="p-2 border space-x-2 text-center whitespace-nowrap">
                                        <a href="{{ route('mahasiswa.show', $row->id) }}"
                                            class="inline-block bg-green-500 hover:bg-green-600 text-black px-3 py-1 rounded text-sm">
                                            Lihat
                                        </a>

                                        <a href="{{ route('mahasiswa.edit', $row->id) }}"
                                            class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('mahasiswa.destroy', $row->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-gray-500">Belum ada data mahasiswa.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>