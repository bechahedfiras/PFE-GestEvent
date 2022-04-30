<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/template/js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="shortcut icon" href={{ asset('/template/images/favicon.png" type="image/png') }}>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href={{ asset('/template/css/bootstrap.min.css') }}>

    <!--====== Flaticon css ======-->
    <link rel="stylesheet" href={{ asset('/template/css/flaticon.css') }}>

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href={{ asset('/template/css/LineIcons.css') }}>

    <!--====== Animate css ======-->
    <link rel="stylesheet" href={{ asset('/template/css/animate.css') }}>

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href={{ asset('/template/css/magnific-popup.css') }}>

    <!--====== Slick css ======-->
    <link rel="stylesheet" href={{ asset('/template/css/slick.css') }}>

    <!--====== Default css ======-->
    <link rel="stylesheet" href={{ asset('/template/css/default.css') }}>

    <!--====== Style css ======-->
    <link rel="stylesheet" href={{ asset('/template/css/style.css') }}>

</head>

<body>
    <div id="app">
      
        <div class="navbar-area navbar-two" style="background: linear-gradient(to right, #102baf 0%, #1664ff 100%);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                         <?php
                        use App\Http\Controllers\CartController;
                        $total=CartController::cartitem();
                        ?> 
                        <nav class="navbar navbar-expand-lg ">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src={{ asset('/template/images/logo.png') }} alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo"
                                aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                                <ul class="navbar-nav m-auto">

                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ url('/events')}}">Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ url('/contact') }}">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ url('/cart-List') }}"><i class="fas fa-cart-plus">( {{$total}}) Panier</i></a>
                                    </li>
                                </ul>
                                @if (!Auth::user())
                                    <a class="main-btn mr-3" href="{{ route('login') }}">Sign in</a>
                                    <a class="main-btn" href="{{ route('register') }}">Sign up</a>
                                @else
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                        style="color: aliceblue" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @can('manage-users')
                                            <a href="{{ route('admin.users.index') }}" class="dropdown-item">Dashboard</a>
                                        @endcan
                                        <a href="{{ route('users.edit-profile') }}" class="dropdown-item">My Profile</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                    </li>
                                @endif
                            </div>


                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

        <main class="py-4">
            @yield('content')
        </main>
        <!--====== FOOTER PART START ======-->

        <section id="footer" class="footer-area bg_cover mt-180" style="background-image: url(assets/images/footer.jpg)">
            <div class="footer-widget">
                <div class="container">
                    <div class="widget  pt-80 pb-130">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="footer-address mt-40">
                                    <h5 class="f-title">Venue Location</h5>
                                    <p class="text">18 - 21 DECEMBER, 2022 <br> 51 Francis Street, Cesare
                                        Rosaroll, 118 80139 Eventine</p>
                                    <a class="contact-link" href="#">Contact Our Authority</a>
                                </div> <!-- footer address -->
                            </div>
                            <div class="col-lg-6">
                                <div class="footer-contact mt-40">
                                    <h5 class="f-title">Social Connection</h5>
                                    <p class="text">Don't miss a thing! Receive daily news You should connect
                                        social area for Any Proper Updates Anytime</p>
                                    <ul class="social">
                                        <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                        <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                        <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                                        <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- widget -->
                </div> <!-- container -->
            </div> <!-- footer widget -->
    </div>





    <!--====== jquery js ======-->
    <script src={{ asset('/template/js/vendor/modernizr-3.6.0.min.js') }}></script>
    <script src={{ asset('/template/js/vendor/jquery-1.12.4.min.js') }}></script>

    <!--====== Bootstrap js ======-->
    <script src={{ asset('/template/js/bootstrap.min.js') }}></script>
    <script src={{ asset('/template/js/popper.min.js') }}></script>

    <!--====== Counter Up js ======-->
    <script src={{ asset('/template/js/waypoints.min.js') }}></script>
    <script src={{ asset('/template/js/jquery.counterup.min.js') }}></script>

    <!--====== Slick js ======-->
    <script src={{ asset('/template/js/slick.min.js') }}></script>

    <!--====== Magnific Popup js ======-->
    <script src={{ asset('/template/js/jquery.magnific-popup.min.js') }}></script>

    <!--====== Scrolling Nav js ======-->
    <script src={{ asset('/template/js/jquery.easing.min.js') }}></script>
    <script src={{ asset('/template/js/scrolling-nav.js') }}></script>

    <!--====== Countdown js ======-->
    <script src={{ asset('/template/js/jquery.countdown.min.js') }}></script>

    <!--====== wow js ======-->
    <script src={{ asset('/template/js/wow.min.js') }}></script>

    <!--====== Ajax Contact js ======-->
    <script src={{ asset('/template/js/ajax-contact.js') }}></script>

    <!--====== Main js ======-->
    <script src={{ asset('/template/js/main.js') }}></script>

</body>

</html>
