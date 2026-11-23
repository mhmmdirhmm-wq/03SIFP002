<!-- Cari bagian tombol ini di index.blade.php Anda -->
<div class="mb-3 d-flex justify-content-end gap-2">
    <a href="{{ route('product.create') }}" class="btn btn-success">
        + Tambah Product
    </a>
    <a href="{{ route('product.cetakPdf') }}" target="_blank" class="btn btn-primary">
        Cetak PDF
    </a>
</div>

<!-- Tabel Data Product -->
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th width="5%" class="text-center">No</th>
                    <th width="20%">Nama</th>
                    <th width="15%" class="text-center">Gambar</th>
                    <th width="30%">Deskripsi</th>
                    <th width="15%">Harga</th>
                    <th width="15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $index => $p)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $p->name }}</td>
                    <td class="text-center">
                        @if($p->image)
                        <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}" style="width: 60px; height: 60px; object-fit: cover;">
                        @else
                        <span class="text-muted" style="font-size: 12px;">No Image</span>
                        @endif
                    </td>
                    <td>{{ $p->descriptions }}</td>
                    <td>{{ $p->price }}</td> <!-- Atau gunakan number_format jika ingin berformat angka -->
                    <td class="text-center">
                        <a href="{{ route('product.show', $p->id) }}" class="btn btn-secondary btn-sm">Lihat</a>
                        <a href="{{ route('product.edit', $p->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                        <form action="{{ route('product.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No data available in table</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection