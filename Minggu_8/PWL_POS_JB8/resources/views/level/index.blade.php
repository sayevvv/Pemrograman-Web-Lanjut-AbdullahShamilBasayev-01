@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Level</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('/level/import') }}')" class="btn btn-info">Import Level</button>
            <a href="{{ url('/level/export_excel') }}" class="btn btn-primary"><i class="fa fa-fileexcel"></i> Export Level</a>
            <a href="{{ url('/level/export_pdf') }}" class="btn btn-warning"><i class="fa fa-filepdf"></i> Export Level (PDF)</a>
            <button onclick="modalAction('{{ url('/level/create_ajax') }}')" class="btn btn-success">Tambah Level (Ajax)</button>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-sm table-striped table-hover" id="table-level">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Level</th>
                    <th>Nama Level</th>
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

var tableLevel;
$(document).ready(function() {
    tableLevel = $('#table-level').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('level/list') }}",
            dataType: "json",
            type: "POST"
        },
        columns: [
            { data: "DT_RowIndex", className: "text-center", width: "5%", orderable: false, searchable: false },
            { data: "level_kode", width: "30%", orderable: true, searchable: true },
            { data: "level_nama", width: "50%", orderable: true, searchable: true },
            { data: "aksi", className: "text-center", width: "15%", orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
