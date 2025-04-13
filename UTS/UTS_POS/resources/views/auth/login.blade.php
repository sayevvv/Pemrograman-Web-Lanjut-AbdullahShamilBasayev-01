{{-- login.blade.php --}}
@extends('layouts.authTemplate')

@section('title', 'Login')

@section('overlay-title', 'Selamat Datang Kembali')
@section('overlay-description', 'Masuk ke dalam akun anda untuk mengakses fitur dan layanan kami.')

@section('form-title', 'Masuk ke akun Anda')

@section('form-content')
    <form action="{{ url('login') }}" method="POST" id="form-login">
        @csrf
        <div class="input-group mb-3 align-items-stretch">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
            <small id="error-username" class="error-text text-danger"></small>
        </div>

        <div class="input-group mb-3 align-items-stretch">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            <small id="error-password" class="error-text text-danger"></small>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember"><label for="remember">Remember
                        Me</label>
                </div>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-dark rounded-pill">Sign In</button>
            </div>
        </div>
        <a href="{{ url('register') }}" class="text-center mt-3 d-block text-decoration-none">Belum punya akun?</a>
    </form>
@endsection

@section('bottom-link')
    <a href="{{ route('home') }}" class="mt-3 d-block text-center text-decoration-none">Kembali ke home</a>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#form-login").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 4,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
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
                                    title: 'Berhasil',
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
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
