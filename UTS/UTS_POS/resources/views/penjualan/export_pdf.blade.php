@extends('layouts.pdf')

@section('content')
<h3 class="text-center">LAPORAN DATA PENJUALAN</h3>
<table class="border-all">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Kode Penjualan</th>
            <th>Tanggal</th>
            <th>Pembeli</th>
            <th>User</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penjualan as $p)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $p->penjualan_kode }}</td>
            <td>{{ $p->penjualan_tanggal }}</td>
            <td>{{ $p->pembeli }}</td>
            <td>{{ $p->user->nama ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
