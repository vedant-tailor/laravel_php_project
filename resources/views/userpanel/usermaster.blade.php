<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="{{asset('css/tiny-slider.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <title>Furniture</title>
    </head>

    <body>

        <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

            <div class="container">
                <a class="navbar-brand" href="{{ url('/userindex') }}">Furni<span>.</span></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsFurni">
                    
                    {{-- Navigation links with active state --}}
                    <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item {{ Request::is('userindex') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/userindex') }}">Home</a>
                        </li>
                        <li class="nav-item {{ Request::is('viewproduct*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/viewproduct') }}">Shop</a>
                        </li>
                        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/about') }}">About us</a>
                        </li>
                        <li class="nav-item {{ Request::is('services') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/services') }}">Services</a>
                        </li>
                        <li class="nav-item {{ Request::is('blog*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                        </li>
                        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/contact') }}">Contact us</a>
                        </li>
                    </ul>


                    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                        <li><a class="nav-link" href="#"><img src="{{asset('images/user.svg')}}"></a></li>
                        
                        {{-- 1. CORRECTED CART LINK --}}
                        <li><a class="nav-link" href="{{ route('cart.view') }}"><img src="{{asset('images/cart.svg')}}"></a></li>
                        
                        {{-- 2. ADDED LOGOUT BUTTON --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               style="color: white; opacity: 0.5;" {{-- Optional: style to match other links --}}
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        {{-- END OF LOGOUT LINK --}}
                    </ul>
                </div>
            </div>
                
        </nav>

        {{-- 3. HERO SECTION NOW ONLY SHOWS ON HOMEPAGE --}}
        @if (Request::is('userindex'))
            <div class="hero">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-5">
                            <div class="intro-excerpt">
                                <h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
                                <p class="mb-4">May he live without hatred, the one who desires the nation's favor. No one needs a quiver. A threatening arrow brings pain and sorrow..</p>
                                <p><a href="{{ route('products.shop') }}" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="hero-img-wrap">
                                <img src="{{asset('images/couch.png')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
        {{-- This is where your other pages (userindex, cart) will be injected --}}
        @yield('content')

        <footer class="footer-section">
            <div class="container relative">
            
                <div class="sofa-img">
                    {{-- Fixed image path --}}
                    <img src="{{ asset('images/sofa.png') }}" alt="Image" class="img-fluid">
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="subscription-form">
                            {{-- Fixed image path --}}
                            <h3 class="d-flex align-items-center"><span class="me-1"><img src="{{ asset('images/envelope-outline.svg') }}" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

                            <form action="#" class="row g-3">
                                <div class="col-auto">
                                    <input type="text" class="form-control" placeholder="Enter your name">
                                </div>
                                <div class="col-auto">
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary">
                                        <span class="fa fa-paper-plane"></span>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="row g-5 mb-5">
                    <div class="col-lg-4">
                        <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
                        <p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

                        <ul class="list-unstyled custom-social">
                            <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                            <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                            <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                        </ul>
                    </div>

                    <div class="col-lg-8">
                        <div class="row links-wrap">
                            <div class="col-6 col-sm-6 col-md-3">
                                <ul class="list-unstyled">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact us</a></li>
                                </ul>
                            </div>

                            <div class="col-6 col-sm-6 col-md-3">
                                <ul class="list-unstyled">
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">Knowledge base</a></li>
                                    <li><a href="#">Live chat</a></li>
                                </ul>
                            </div>

                            <div class="col-6 col-sm-6 col-md-3">
                                <ul class="list-unstyled">
                                    <li><a href="#">Jobs</a></li>
                                    <li><a href="#">Our team</a></li>
                                    <li><a href="#">Leadership</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>

                            <div class="col-6 col-sm-6 col-md-3">
                                <ul class="list-unstyled">
                                    <li><a href="#">Nordic Chair</a></li>
                                    <li><a href="#">Kruzo Aero</a></li>
                                    <li><a href="#">Ergonomic Chair</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="border-top copyright">
                    <div class="row pt-4">
                        <div class="col-lg-6">
                            {{-- Fixed broken 'hreff' --}}
                            <p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>  </p>
                        </div>

                        <div class="col-lg-6 text-center text-lg-end">
                            <ul class="list-unstyled d-inline-flex ms-auto">
                                <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </footer>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/tiny-slider.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
    </body>

</html>