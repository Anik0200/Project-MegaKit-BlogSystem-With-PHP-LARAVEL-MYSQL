<!DOCTYPE html>
<html>

<head>

    <!-- ** Basic Page Needs ** -->
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- ** Mobile Specific Metas ** -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Agency HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    @yield('css')

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/slick/slick-theme.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

    <!--Favicon-->
    <link rel="icon" href="{{ asset('assets/frontend/images/favicon.png') }}" type="image/x-icon">

</head>

<body>

    <!-- Header Start -->
    <header class="navigation">

        <div class="header-top ">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-2 col-md-4">
                        <div class="header-top-socials text-center text-lg-left text-md-left">
                            <a href="#" aria-label="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="github"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
                        <div class="header-top-info mb-2 mb-md-0">
                            <a href="tel:+23-345-67890">Call Us : <span>+8801729101989</span></a>
                            <a href="mailto:support@gmail.com"><i
                                    class="fas fa-envelope mr-2"></i><span>tajbinanik02@gmail.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="navbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg px-0 py-4">
                            <a class="navbar-brand" href="{{ route('frontend.index') }}">
                                Mega<span>kit.</span>
                            </a>

                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                                data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="fa fa-bars"></span>
                            </button>

                            <div class="collapse navbar-collapse text-center" id="navbarsExample09">

                                <ul class="navbar-nav ml-auto">

                                    <li class="nav-item @@home">
                                        <a class="nav-link" href="{{ route('frontend.index') }}">Home</a>
                                    </li>

                                </ul>

                                <div class="my-2 my-md-0 ml-lg-4 text-center">
                                    <form method="POST" action="{{ route('postSerch') }}">
                                        @csrf
                                        <input class="btn btn-solid-border btn-round-full" type="text" name="search"
                                            placeholder="Search">
                                        <button type="submit" hidden>Submit</button>
                                    </form>
                                </div>

                                <div class="my-2 my-md-0 ml-lg-4 text-center">
                                    <a href="{{ route('login') }}"
                                        class="btn btn-solid-border btn-round-full">LOGIN</a>
                                </div>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- Header Close -->

    <!-- content Start -->

    @yield('content')

    <!-- content Close -->

    <!-- footer Start -->

    <footer>
        <div class="container">

            <div class="footer-btm pt-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copyright">
                            Copyright &copy; 2020, Designed &amp; Developed by <a href="#">Tajbin
                                Anik</a>
                        </div>
                    </div>

                    <div class="col-lg-6 text-left text-lg-right">
                        <ul class="list-inline footer-socials">
                            <li class="list-inline-item"><a href="#"><i
                                        class="fab fa-facebook-f mr-2"></i>Facebook</a></li>
                            <li class="list-inline-item"><a href="#"><i
                                        class="fab fa-twitter mr-2"></i>Twitter</a></li>
                            <li class="list-inline-item"><a href="#"><i
                                        class="fab fa-pinterest-p mr-2 "></i>Pinterest</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </footer>

    <!-- footer Close -->

    <!--Scroll to top-->
    <div id="scroll-to-top" class="scroll-to-top">
        <span class="icon fa fa-angle-up"></span>
    </div>


    <!--
Essential Scripts
=====================================-->
    <!-- Main jQuery -->
    <script src="{{ asset('assets/frontend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="{{ asset('assets/frontend/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <!--  Magnific Popup-->
    <script src="{{ asset('assets/frontend/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('assets/frontend/plugins/slick/slick.min.js') }}"></script>
    <!-- Counterup -->
    <script src="{{ asset('assets/frontend/plugins/counterup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/plugins/counterup/jquery.counterup.min.js') }}"></script>

    <!-- Google Map -->
    <script src="{{ asset('assets/frontend/plugins/google-map/map.js') }}" defer></script>

    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>

    @yield('js')

</body>

</html>
