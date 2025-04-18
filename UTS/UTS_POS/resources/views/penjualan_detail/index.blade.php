@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a href="{{ url('/penjualan_detail/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i> Export
                    Penjualan</a>
                <a href="{{ url('/penjualan_detail/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i> Export
                    Penjualan (PDF)</a>
                <button onclick="modalAction('{{ url('/penjualan_detail/import') }}')" class="btn btn-info">Import Detail Penjualan</button>
                <button onclick="modalAction('{{ url('/penjualan_detail/create_ajax') }}')" class="btn btn-success">Tambah Detail
                    Penjualan</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Penjualan</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>

    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
        var dataPenjualanDetail;
        $(document).ready(function() {
            dataPenjualanDetail = $('#table_penjualan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('penjualan_detail/list') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "penjualan",
                        className: ""
                    },
                    {
                        data: "barang",
                        className: ""
                    },
                    {
                        data: "harga",
                        className: ""
                    },
                    {
                        data: "jumlah",
                        className: ""
                    },
                    {
                        data: "subtotal",
                        className: ""
                    }, // ← kolom baru
                    {
                        data: "aksi",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                ]

            });
        });
    </script>
@endpush
