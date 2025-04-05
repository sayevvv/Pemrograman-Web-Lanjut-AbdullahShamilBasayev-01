@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Supplier</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('/supplier/import') }}')" class="btn btn-info">Import Supplier</button>
            <a href="{{ url('/supplier/export_excel') }}" class="btn btn-primary"><i class="fa fa-fileexcel"></i> Export Supplier</a>
            <a href="{{ url('/supplier/export_pdf') }}" class="btn btn-warning"><i class="fa fa-filepdf"></i> Export Supplier (PDF)</a>
            <button onclick="modalAction('{{ url('/supplier/create_ajax') }}')" class="btn btn-success">Tambah Supplier (Ajax)</button>
        </div>
    </div>
    <div class="card-body">
        <!-- Filter Data -->
        <div id="filter" class="form-horizontal filter-date p-2 border-bottom mb-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-sm row text-sm mb-0">
                        <label for="filter_supplier_nama" class="col-md-1 col-form-label">Cari</label>
                        <div class="col-md-3">
                            <input type="text" id="filter_supplier_nama" class="form-control form-control-sm" placeholder="Nama Supplier">
                            <small class="form-text text-muted">Tekan Enter untuk mencari</small>
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

        <table class="table table-bordered table-sm table-striped table-hover" id="table-supplier">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
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

var tableSupplier;
$(document).ready(function() {
    tableSupplier = $('#table-supplier').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('supplier/list') }}",
            dataType: "json",
            type: "POST",
            data: function(d) {
                d.supplier_nama = $('#filter_supplier_nama').val();
            }
        },
        columns: [
            { data: "DT_RowIndex", className: "text-center", width: "5%", orderable: false, searchable: false },
            { data: "supplier_kode", width: "20%", orderable: true, searchable: true },
            { data: "supplier_nama", width: "30%", orderable: true, searchable: true },
            { data: "supplier_alamat", width: "30%", orderable: true, searchable: true },
            { data: "aksi", className: "text-center", width: "15%", orderable: false, searchable: false }
        ]
    });

    $('#filter_supplier_nama').on('keypress', function(e) {
        if (e.which == 13) { // Enter key
            tableSupplier.search(this.value).draw();
        }
    });
});
</script>
@endpush
