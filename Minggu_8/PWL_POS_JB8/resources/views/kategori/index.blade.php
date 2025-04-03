@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Kategori</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('/kategori/import') }}')" class="btn btn-info">Import Kategori</button>
            <button onclick="modalAction('{{ url('/kategori/create') }}')" class="btn btn-primary">Tambah Data</button>
            <button onclick="modalAction('{{ url('/kategori/create_ajax') }}')" class="btn btn-success">Tambah Data (Ajax)</button>
        </div>
    </div>
    <div class="card-body">
        <!-- Alert -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-striped table-hover table-sm" id="table_kategori">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
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
        $('#myModal').load(url, function () {
            $('#myModal').modal('show');
        });
    }

    var tableKategori;
    $(document).ready(function () {
        tableKategori = $('#table_kategori').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('kategori/list') }}",
                type: "POST",
                dataType: "json"
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    className: "text-center",
                    width: "5%",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "kategori_kode",
                    width: "20%",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "kategori_nama",
                    width: "50%",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "aksi",
                    className: "text-center",
                    width: "25%",
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>
@endpush
