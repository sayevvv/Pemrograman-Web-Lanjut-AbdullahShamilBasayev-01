@extends('layouts.pdf')

@section('content')
<h3 class="text-center">LAPORAN DATA USER</h3>
<table class="border-all">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $u)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $u->username }}</td>
            <td>{{ $u->nama }}</td>
            <td>{{ $u->level->level_nama ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
