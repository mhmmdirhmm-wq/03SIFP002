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

    <!-- DataTables & jQuery CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    
    <!-- 1. WAJIB: Muat jQuery terlebih dahulu di paling atas -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- 2. Baru kemudian muat DataTables di bawahnya -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Init Datatable -->
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