@extends('layouts.template') {{-- atau layout yang kamu gunakan --}}

@section('content')
<div class="container">
    <div class="card text-center py-4">
        {{-- Tambahkan Profile Picture --}}
        <div class="mb-3">
            <img src="{{ url('/profile/picture/' . Auth::id()) }}"
                 class="img-circle elevation-2"
                 alt="User Image"
                 style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #ddd; border-radius: 50%;">
                 <button class="btn btn-sm btn-primary mt-2" onclick="modalAction('{{ route('profile.editPfp') }}')">
                    Ubah Foto Profil
                </button>
        </div>

        <div class="card-body">
            <p><strong>ID Level:</strong> {{ $user->level_id }}</p>
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Nama:</strong> {{ $user->nama }}</p>
            <p><strong>Role:</strong> {{ $user->level->level_nama ?? 'Tidak diketahui' }}</p>
            {{-- tambahkan data lain sesuai kebutuhan --}}
        </div>
    </div>
</div>

<div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>
@endsection

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
</script>
