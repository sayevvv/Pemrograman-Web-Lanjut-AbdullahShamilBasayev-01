@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Stok</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('/stok/import') }}')" class="btn btn-info">Import Stok</button>
            <a href="{{ url('/stok/export_excel') }}" class="btn btn-primary"><i class="fa fa-fileexcel"></i> Export Stok</a>
            <button onclick="modalAction('{{ url('/stok/create_ajax') }}')" class="btn btn-success">Tambah Stok (Ajax)</button>
        </div>
    </div>
    <div class="card-body">
        <!-- Filter Data -->
        <div id="filter" class="form-horizontal filter-date p-2 border-bottom mb-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-sm row text-sm mb-0">
                        <label for="barang_id" class="col-md-3 col-form-label">Barang</label>
                        <div class="col-md-9">
                            <select class="form-control form-control-sm" id="barang_id" name="barang_id">
                                <option value="">- Semua Barang -</option>
                                @foreach($barang as $item)
                                    <option value="{{ $item->barang_id }}">{{ $item->barang_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group form-group-sm row text-sm mb-0">
                        <label for="supplier_id" class="col-md-3 col-form-label">Supplier</label>
                        <div class="col-md-9">
                            <select class="form-control form-control-sm" id="supplier_id" name="supplier_id">
                                <option value="">- Semua Supplier -</option>
                                @foreach($supplier as $item)
                                    <option value="{{ $item->supplier_id }}">{{ $item->supplier_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-sm table-striped table-hover" id="table-stok">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Supplier</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>
@endsection

@push('js')
<script>
function modalAction(url = '') {
    console.log("Fetching modal from:", url); // Debugging
    $('#myModal').load(url, function(response, status, xhr) {
        if (status == "error") {
            console.log("Error loading modal:", xhr.status, xhr.statusText);
        } else {
            $('#myModal').modal('show');
        }
    });
}

var tableStok;
$(document).ready(function() {
    tableStok = $('#table-stok').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('stok/list') }}",
            dataType: "json",
            type: "POST",
            data: function(d) {
                d.barang_id = $('#barang_id').val();
                d.supplier_id = $('#supplier_id').val();
            }
        },
        columns: [
            { data: "DT_RowIndex", className: "text-center", width: "5%", orderable: false, searchable: false },
            { data: "barang.barang_kode", width: "15%", orderable: true, searchable: true },
            { data: "barang.barang_nama", width: "25%", orderable: true, searchable: true },
            { data: "supplier.supplier_nama", width: "20%", orderable: true, searchable: true },
            { data: "stok_jumlah", className: "text-center", width: "10%", orderable: true, searchable: false },
            { data: "stok_tanggal", className: "text-center", width: "15%", orderable: true, searchable: false },
            { data: "aksi", className: "text-center", width: "10%", orderable: false, searchable: false }
        ]
    });

    $('#barang_id, #supplier_id').on('change', function() {
        tableStok.ajax.reload();
    });
});
</script>
@endpush
