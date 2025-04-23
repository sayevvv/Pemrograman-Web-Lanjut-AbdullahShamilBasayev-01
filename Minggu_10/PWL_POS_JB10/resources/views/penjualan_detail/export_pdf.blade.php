@extends('layouts.pdf')

@section('content')
<h3 class="text-center">LAPORAN DATA PENJUALAN DETAIL</h3>
<table class="border-all">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
            <th>User</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penjualan_detail as $d)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $d->penjualan->penjualan_tanggal ?? '-' }}</td>
            <td>{{ $d->barang->barang_nama ?? '-' }}</td>
            <td class="text-right">{{ $d->jumlah }}</td>
            <td class="text-right">{{ number_format($d->harga, 0, ',', '.') }}</td>
            <td class="text-right">{{ number_format($d->harga * $d->jumlah, 0, ',', '.') }}</td>
            <td>{{ $d->penjualan->user->nama ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
