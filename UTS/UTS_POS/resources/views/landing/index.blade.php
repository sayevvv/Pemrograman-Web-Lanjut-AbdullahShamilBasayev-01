<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SalesPoint - Modern Point of Sales Solution</title>
    <!-- Assuming Bootstrap and other assets are locally included -->
     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet"
     href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- Data Tables --}}
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    {{-- SweetAlert2 --}}
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                SalesPoint
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-it-works">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-primary rounded-pill px-4" href="#contact">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="py-5 py-md-7 bg-light min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="display-4 fw-bold mb-3">Streamline Your Sales with SalesPoint</h1>
                    <p class="lead text-secondary mb-4">The modern point of sales solution designed to help businesses of all sizes manage transactions efficiently and grow revenue.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#" class="btn btn-primary btn-lg rounded-pill px-4">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="{{ asset('images/landing.png') }}" alt="SalesPoint Dashboard" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5 py-md-7">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="fw-bold mb-3">Powerful Features for Modern Businesses</h2>
                    <p class="lead text-secondary">Everything you need to manage sales, inventory, and customer relationships in one place.</p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-primary bg-opacity-10 text-primary p-3 rounded-circle mb-3 mx-auto" style="width: 70px; height: 70px;">
                                <i class="bi bi-cart-check fs-4"></i>
                            </div>
                            <p class="card-text fw-bold">Quick Checkout</p>
                            <p class="card-text text-secondary">Process transactions in seconds with our intuitive interface and smart shortcuts.</p>
                        </div>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-primary bg-opacity-10 text-primary p-3 rounded-circle mb-3 mx-auto" style="width: 70px; height: 70px;">
                                <i class="bi bi-graph-up fs-4"></i>
                            </div>
                            <p class="card-text fw-bold">Real-time Analytics</p>
                            <p class="card-text text-secondary">Track sales performance and inventory levels with powerful dashboards and reports.</p>
                        </div>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-primary bg-opacity-10 text-primary p-3 rounded-circle mb-3 mx-auto" style="width: 70px; height: 70px;">
                                <i class="bi bi-people fs-4"></i>
                            </div>
                            <p class="card-text fw-bold">Customer Management</p>
                            <p class="card-text text-secondary">Build lasting relationships with integrated CRM tools and loyalty programs.</p>
                        </div>
                    </div>
                </div>
                <!-- Feature 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-primary bg-opacity-10 text-primary p-3 rounded-circle mb-3 mx-auto" style="width: 70px; height: 70px;">
                                <i class="bi bi-box-seam fs-4"></i>
                            </div>
                            <p class="card-text fw-bold">Inventory Control</p>
                            <p class="card-text text-secondary">Manage stock levels efficiently with automated alerts and reordering capabilities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-5 py-md-7 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="fw-bold mb-3">How SalesPoint Works</h2>
                    <p class="lead text-secondary">Get up and running in minutes with our simple setup process.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row g-4">
                        <!-- Step 1 -->
                        <div class="col-md-4">
                            <div class="card border-0 bg-white shadow-sm h-100">
                                <div class="card-body p-4 text-center">
                                    <div class="step-number bg-primary text-white rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <span class="fw-bold">1</span>
                                    </div>
                                    <h5 class="fw-bold">Sign Up</h5>
                                    <p class="text-secondary mb-0">Create your account and select a plan that fits your business needs.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Step 2 -->
                        <div class="col-md-4">
                            <div class="card border-0 bg-white shadow-sm h-100">
                                <div class="card-body p-4 text-center">
                                    <div class="step-number bg-primary text-white rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <span class="fw-bold">2</span>
                                    </div>
                                    <h5 class="fw-bold">Configure</h5>
                                    <p class="text-secondary mb-0">Set up your inventory, pricing, and customize the system to your preferences.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Step 3 -->
                        <div class="col-md-4">
                            <div class="card border-0 bg-white shadow-sm h-100">
                                <div class="card-body p-4 text-center">
                                    <div class="step-number bg-primary text-white rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <span class="fw-bold">3</span>
                                    </div>
                                    <h5 class="fw-bold">Start Selling</h5>
                                    <p class="text-secondary mb-0">Begin processing transactions and growing your business with powerful insights.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5 py-md-7">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="fw-bold mb-3">Trusted by Businesses Worldwide</h2>
                    <p class="lead text-secondary">See what our customers have to say about SalesPoint.</p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Testimonial 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="card-text mb-3">"SalesPoint transformed our retail operations. We've increased efficiency by 40% and our staff loves how easy it is to use."</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary bg-opacity-10 me-3" style="width: 50px; height: 50px;"></div>
                                <div>
                                    <h6 class="mb-0 fw-bold">Sarah Johnson</h6>
                                    <small class="text-secondary">Retail Store Owner</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="card-text mb-3">"The inventory management features alone are worth the investment. We've reduced stockouts by 75% since implementing SalesPoint."</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary bg-opacity-10 me-3" style="width: 50px; height: 50px;"></div>
                                <div>
                                    <h6 class="mb-0 fw-bold">Michael Chen</h6>
                                    <small class="text-secondary">Restaurant Manager</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <i class="bi bi-star-half text-warning"></i>
                            </div>
                            <p class="card-text mb-3">"Customer support is exceptional. Any time we've had questions, the team has been responsive and helpful. Highly recommend!"</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary bg-opacity-10 me-3" style="width: 50px; height: 50px;"></div>
                                <div>
                                    <h6 class="mb-0 fw-bold">Jessica Martinez</h6>
                                    <small class="text-secondary">Boutique Owner</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Trust Logos -->
            <div class="row mt-5 align-items-center">
                <div class="col-12 text-center">
                    <p class="text-uppercase small fw-bold text-secondary mb-4">Trusted by leading brands</p>
                    <div class="row g-4 justify-content-center">
                        <div class="col-4 col-md-2">
                            <img src="{{ asset('images/logo-1.png') }}" alt="Company Logo" class="img-fluid opacity-50">
                        </div>
                        <div class="col-4 col-md-2">
                            <img src="{{ asset('images/logo-2.png') }}" alt="Company Logo" class="img-fluid opacity-50">
                        </div>
                        <div class="col-4 col-md-2">
                            <img src="{{ asset('images/logo-3.png') }}" alt="Company Logo" class="img-fluid opacity-50">
                        </div>
                        <div class="col-4 col-md-2">
                            <img src="{{ asset('images/logo-4.png') }}" alt="Company Logo" class="img-fluid opacity-50">
                        </div>
                        <div class="col-4 col-md-2">
                            <img src="{{ asset('images/logo-5.png') }}" alt="Company Logo" class="img-fluid opacity-50">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="py-5 py-md-7 bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-3">Ready to Transform Your Business?</h2>
                    <p class="lead mb-4">Join thousands of businesses that trust SalesPoint for their point of sales needs.</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#" class="btn btn-light btn-lg rounded-pill px-4 fw-bold text-primary">Start Your Free Trial</a>
                        <a href="#" class="btn btn-outline-light btn-lg rounded-pill px-4">Contact Sales</a>
                    </div>
                    <p class="mt-4 small">No credit card required. 14-day free trial.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="fw-bold mb-3">SalesPoint</h5>
                    <p class="text-white-50">The modern point of sales solution for businesses of all sizes.</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-light rounded-circle">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-light rounded-circle">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-light rounded-circle">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-light rounded-circle">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <h6 class="fw-bold mb-3">Product</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Features</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Pricing</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Integrations</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Updates</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <h6 class="fw-bold mb-3">Resources</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Documentation</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Tutorials</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Blog</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Support</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <h6 class="fw-bold mb-3">Company</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Careers</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Contact</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Partners</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <h6 class="fw-bold mb-3">Legal</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Privacy Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Terms of Service</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-white-50">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="small text-white-50 mb-md-0">&copy; {{ date('Y') }} SalesPoint. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="small text-white-50">Made with ❤️ for businesses worldwide</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
