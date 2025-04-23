{{-- auth-template.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Authentication')</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- SweetAlert2 --}}
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    {{-- Libre Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: #f8f9fa;
        }
        .libre {
            font-family: 'Libre Baskerville', serif;
            font-weight: 400;
        }
        .img-overlay-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .overlay-text {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            padding: 2rem 3rem;
            z-index: 10;
            color: white;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.4) 60%, transparent 100%);
        }
        .big-text {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            line-height: 1.2;
        }
        .small-text {
            font-size: 1.1rem;
            font-weight: 300;
            opacity: 0.9;
            max-width: 80%;
        }
        .auth-card {
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        }
        @yield('custom-styles')
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <!-- Left Side: Image -->
            <div class="col-md-6 d-none d-md-block p-0">
                <div class="img-overlay-container">
                    <img src="@yield('background-image', asset('images/landingimage.jpg'))" alt="@yield('image-alt', 'Authentication')"
                        class="img-fluid h-100 w-100" style="object-fit: cover;">
                    <div class="overlay-text">
                        <div class="big-text libre">@yield('overlay-title', 'Welcome')</div>
                        <div class="small-text">@yield('overlay-description', 'Please authenticate to access the system.')</div>
                    </div>
                </div>
            </div>
            <!-- Right Side: Form -->
            <div class="col-md-6 d-flex align-items-center justify-content-center bg-white">
                <div class="w-100" style="max-width: 400px;">
                    <div class="text-center mb-4">
                        <a href="{{ url('/') }}" class="img-fluid">
                            <img src="{{ asset('images/SalesPoint.svg') }}" alt="Logo" class="img-fluid" style="width: 100px; height: auto;">
                        </a>
                    </div>

                    <div class="card auth-card border-0">
                        <div class="card-body p-4">
                            <h4 class="text-center mb-4">@yield('form-title', 'Sign in to your account')</h4>

                            @yield('form-content')

                        </div>
                    </div>

                    <div class="text-center mt-3">
                        @yield('bottom-link')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- jQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('scripts')
</body>

</html>
