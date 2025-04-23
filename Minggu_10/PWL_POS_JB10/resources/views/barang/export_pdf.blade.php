@extends('layouts.pdf')

@section('content')
<h3 class="text-center">LAPORAN DATA BARANG</h4>
    <table class="border-all">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th class="text-right">Harga Beli</th>
                <th class="text-right">Harga Jual</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $b)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $b->barang_kode }}</td>
                    <td>{{ $b->barang_nama }}</td>
                    <td class="text-right">{{ number_format($b->harga_beli, 0, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($b->harga_jual, 0, ',', '.') }}</td>
                    <td>{{ $b->kategori->kategori_nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


