<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="card shadow-sm p-3">
                    <div class="mb-3 d-flex justify-content-end gap-2" style="display: flex; justify-content: flex-end; gap: 10px; margin-bottom: 15px;">
                        <a href="{{ route('product.create') }}" class="btn btn-success btn-sm" style="background-color: #198754; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none;">
                            + Tambah Product
                        </a>
                        <a href="{{ route('product.cetakPdf') }}" target="_blank" class="btn btn-primary btn-sm" style="background-color: #0d6efd; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none;">
                            Cetak PDF
                        </a>
                    </div>

                    <table id="productTable" class="display" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Tanggal Dibuat</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {  
            var table = $('#productTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('products.data') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'descriptions', name: 'descriptions' },
                    { data: 'price', name: 'price' },
                    { data: 'created_at', name: 'created_at' }
                ]
            });
        });
    </script>
</x-app-layout>