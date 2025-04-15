@extends('layouts.template')

@section('content')
<div class="row">
    <!-- Bento 1: Total Penjualan -->
    <a class="col-md-4 mb-3" href="{{ url('penjualan') }}">
        <div class="card text-dark h-100 shadow-sm card-outline card-primary">
            <div class="card-body d-flex flex-column h-100">
                <!-- Section 1: Judul -->
                <div>
                    <h5 class="card-title">Total Penjualan</h5>
                </div>

                <!-- Section 2: Angka di kanan bawah -->
                <div class="mt-auto d-flex justify-content-end align-items-end">
                    <p class="card-text h3 mb-0">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </a>

    <!-- Bento 2: Total Stok -->
    <a class="col-md-4 mb-3" href="{{ url('stok') }}">
        <div class="card text-dark h-100 shadow-sm card-outline card-danger">
            <div class="card-body d-flex flex-column h-100">
                <div>
                    <h5 class="card-title">Total Stok</h5>
                </div>
                <div class="mt-auto d-flex justify-content-end align-items-end">
                    <p class="card-text h3 mb-0">{{ $totalStok }}</p>
                </div>
            </div>
        </div>
    </a>

    <!-- Bento 3: Total Pengguna -->
    <a class="col-md-4 mb-3" href="{{ url('user') }}">
        <div class="card text-dark h-100 shadow-sm card-outline card-warning">
            <div class="card-body d-flex flex-column h-100">
                <div>
                    <h5 class="card-title">Total Pengguna</h5>
                </div>
                <div class="mt-auto d-flex justify-content-end align-items-end">
                    <p class="card-text h3 mb-0">{{ $totalUser }}</p>
                </div>
            </div>
        </div>
    </a>
</div>
    <div class="card">

        <div class="card-body">
            <p class="text-bold">Penjualan Terakhir</p>
            {{-- Alert untuk Success --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Alert untuk Error --}}
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Penjualan</th>
                        <th>Pembeli</th>
                        <th>Tanggal</th>
                        <th>User</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var dataPenjualan;

        $(document).ready(function() {
            dataPenjualan = $('#table_penjualan').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('penjualan/list') }}",
                    type: "POST",
                    dataType: "json",
                    data: function(d) {
                        // tidak ada filter tambahan
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "penjualan_kode"
                    },
                    {
                        data: "pembeli"
                    },
                    {
                        data: "penjualan_tanggal"
                    },
                    {
                        data: "user_nama"
                    },
                    {
                        data: "total_harga", // <- tambahkan ini
                        className: "text-end", // opsional untuk rata kanan
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endpush
