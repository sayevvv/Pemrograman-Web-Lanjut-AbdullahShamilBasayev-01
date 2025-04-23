{{-- register.blade.php --}}
@extends('layouts.authTemplate')

@section('title', 'Register Pengguna')

@section('overlay-title', 'Create Account')
@section('overlay-description', 'Register untuk akun baru dan mulai menggunakan layanan kami.')

@section('form-title', 'Register untuk akun baru')

@section('form-content')
<form action="{{ url('register') }}" method="POST" id="form-register">
    @csrf
    <div class="input-group mb-3">
        <input type="text" id="username" name="username" class="form-control"
            placeholder="Username">
    </div>
    <small id="error-username" class="error-text text-danger d-block mb-3"></small>

    <div class="input-group mb-3">
        <input type="text" id="nama" name="nama" class="form-control"
            placeholder="Nama Lengkap">
    </div>
    <small id="error-nama" class="error-text text-danger d-block mb-3"></small>

    <div class="input-group mb-3">
        <input type="password" id="password" name="password" class="form-control"
            placeholder="Password">
    </div>
    <small id="error-password" class="error-text text-danger d-block mb-3"></small>

    <div class="input-group mb-3">
        <input type="password" id="password_confirmation" name="password_confirmation"
            class="form-control" placeholder="Konfirmasi Password">
    </div>
    <small id="error-password_confirmation" class="error-text text-danger d-block mb-3"></small>

    <div class="input-group mb-3">
        <select id="level_id" name="level_id" class="form-control">
            <option value="">Pilih Level</option>
            @foreach ($levels as $level)
                <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
            @endforeach
        </select>
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-layer-group"></span></div>
        </div>
    </div>
    <small id="error-level_id" class="error-text text-danger d-block mb-3"></small>

    <div class="row align-items-center mt-4">
        <div class="col-7">
            <a href="{{ url('login') }}" class="link-text text-decoration-none">Sudah punya akun?</a>
        </div>
        <div class="col-5 text-end">
            <button type="submit" class="btn btn-dark rounded-pill">Register</button>
        </div>
    </div>
</form>
@endsection

@section('bottom-link')
{{-- <a href="{{ route('home') }}" class="link-text text-decoration-none">Kembali ke home</a> --}}
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $("#form-register").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 4,
                    maxlength: 20
                },
                nama: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                level_id: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: "Username tidak boleh kosong",
                    minlength: "Username minimal 4 karakter",
                    maxlength: "Username maksimal 20 karakter"
                },
                nama: {
                    required: "Nama tidak boleh kosong"
                },
                password: {
                    required: "Password tidak boleh kosong",
                    minlength: "Password minimal 6 karakter",
                    maxlength: "Password maksimal 20 karakter"
                },
                password_confirmation: {
                    required: "Konfirmasi password tidak boleh kosong",
                    equalTo: "Password tidak sama"
                },
                level_id: {
                    required: "Level harus dipilih"
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Registrasi Berhasil',
                                text: response.message,
                            }).then(function() {
                                window.location = response.redirect;
                            });
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.input-group').append(error);
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endsection
