@extends('layouts.pdf')

@section('content')
<h3 class="text-center">LAPORAN DATA LEVEL</h3>
<table class="border-all">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Kode Level</th>
            <th>Nama Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($level as $l)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $l->level_kode }}</td>
            <td>{{ $l->level_nama }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
