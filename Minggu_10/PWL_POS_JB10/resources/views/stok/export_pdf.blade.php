@extends('layouts.pdf')

@section('content')
<h3 class="text-center">LAPORAN DATA STOK</h3>
<table class="border-all">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Supplier</th>
            <th>User</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stok as $s)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $s->stok_tanggal }}</td>
            <td>{{ $s->barang->barang_nama ?? '-' }}</td>
            <td class="text-right">{{ $s->stok_jumlah }}</td>
            <td>{{ $s->supplier->supplier_nama ?? '-' }}</td>
            <td>{{ $s->user->nama ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
