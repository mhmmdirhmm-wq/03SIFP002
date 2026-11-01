{{-- resources/views/mahasiswa/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Mahasiswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="space-y-3">
                        <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
                        <p><strong>Nama:</strong> {{ $mahasiswa->nama_mahasiswa }}</p>
                        <p><strong>Alamat:</strong> {{ $mahasiswa->alamat ?? '-' }}</p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('mahasiswa.index') }}" class="text-blue-600 hover:text-blue-900">
                            ← Kembali ke Daftar Mahasiswa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>