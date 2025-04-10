@extends('layouts.pdf')

@section('content')
<h3 class="text-center">LAPORAN DATA SUPPLIER</h3>
<table class="border-all">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Kode Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($supplier as $s)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $s->supplier_kode }}</td>
            <td>{{ $s->supplier_nama }}</td>
            <td>{{ $s->supplier_alamat }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
