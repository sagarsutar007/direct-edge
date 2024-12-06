<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="DirectEdge HR Services Agency" name="keywords">
    <meta content="DirectEdge HR Services Company" name="description">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle ?? config('app.name', 'DirectEdge HR Services') }}</title>

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" >

    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-secondary ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body py-2 pe-3 border-end" href="{{ route('faqs') }}"><small>FAQs</small></a>
                    <a class="text-body py-2 px-3 border-end" href="{{ route('support') }}"><small>Support</small></a>
                    <a class="text-body py-2 px-3 border-end" href="{{ route('privacy') }}"><small>Privacy</small></a>
                    <a class="text-body py-2 px-3 border-end" href="{{ route('terms') }}"><small>Terms</small></a>
                    <a class="text-body py-2 ps-3" href="{{ route('career') }}"><small>Career</small></a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-orange text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"><i class="fa fa-envelope-open me-2"></i>info@directedge.co.in</p>
                    </div>
                    <div class="py-2">
                        <p class="m-0"><i class="fa fa-phone-alt me-2"></i>+91 96680 60444</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="{{ route('homepage') }}" class="navbar-brand p-0">
            <img src="/img/logo.png" class="w-85" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 me-n3">
                <a href="{{ route('homepage') }}" class="nav-item nav-link active">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('about') }}" class="dropdown-item">Organization</a>
                        <a href="{{ route('team') }}" class="dropdown-item">Team</a>
                        <a href="{{ route('features') }}" class="dropdown-item">Features</a>
                        <a href="{{ route('testimonial') }}" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                <!-- <a href="{{ route('services') }}" class="nav-item nav-link">Services</a> -->
                <a href="{{ route('certification') }}" class="nav-item nav-link">Certification Program</a>
                <a href="{{ route('jobs') }}" class="nav-item nav-link">Openings</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary p-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Quick Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-secondary mb-2" href="{{ route('homepage') }}"><i class="bi bi-arrow-right text-orange me-2"></i>Home</a>
                    <a class="text-secondary mb-2" href="{{ route('about') }}"><i class="bi bi-arrow-right text-orange me-2"></i>About Us</a>
                    <a class="text-secondary mb-2" href="{{ route('services') }}"><i class="bi bi-arrow-right text-orange me-2"></i>Our Services</a>
                    <a class="text-secondary mb-2" href="{{ route('testimonial') }}"><i class="bi bi-arrow-right text-orange me-2"></i>Testimonial</a>
                    <a class="text-secondary" href="{{ route('contact') }}"><i class="bi bi-arrow-right text-orange me-2"></i>Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Popular Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-secondary mb-2" href="{{ route('certification') }}"><i class="bi bi-arrow-right text-orange me-2"></i>Certification Program</a>
                    <a class="text-secondary mb-2" href="{{ route('jobs') }}"><i class="bi bi-arrow-right text-orange me-2"></i>Job Openings</a>
                    <a class="text-secondary mb-2" href="{{ route('career') }}"><i class="bi bi-arrow-right text-orange me-2"></i>Career</a>
                    <a class="text-secondary mb-2" href="{{ route('support') }}"><i class="bi bi-arrow-right text-orange me-2"></i>Support</a>
                    <a class="text-secondary" href="{{ route('terms') }}"><i class="bi bi-arrow-right text-orange me-2"></i>Terms & Conditions</a>
                    <a class="text-secondary" href="{{ route('privacy') }}"><i class="bi bi-arrow-right text-orange me-2"></i>Privacy Policy</a>
                    <a class="text-secondary" href="{{ route('faqs') }}"><i class="bi bi-arrow-right text-orange me-2"></i>FAQs</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Get In Touch</h3>
                <p class="mb-2"><i class="bi bi-geo-alt text-orange me-2"></i>504, Odyssa Business Centre, Rasulgarh, BBSR-07</p>
                <p class="mb-2"><i class="bi bi-envelope-open text-orange me-2"></i>info@directedge.co.in</p>
                <p class="mb-0"><i class="bi bi-telephone text-orange me-2"></i>+91 96680 60444</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Follow Us</h3>
                <div class="d-flex">
                    <a class="btn btn-lg btn-orange btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-lg btn-orange btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-lg btn-orange btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-lg btn-orange btn-lg-square rounded-circle" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-secondary text-center border-top py-4 px-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <p class="m-0">&copy; <a class="text-secondary border-bottom" href="{{ route('homepage') }}">DirectEdge</a>. All Rights Reserved. </p>
        <span class="font-10">Designed by <a class="text-secondary" href="https://www.infutech.in">Infutech</a></span>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-orange btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/js/main.js"></script>
</body>
</html>
