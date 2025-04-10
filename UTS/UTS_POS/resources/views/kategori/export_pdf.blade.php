@extends('layouts.pdf')

@section('content')
<h3 class="text-center">LAPORAN DATA KATEGORI</h3>
<table class="border-all">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Kode Kategori</th>
            <th>Nama Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategori as $k)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $k->kategori_kode }}</td>
            <td>{{ $k->kategori_nama }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
