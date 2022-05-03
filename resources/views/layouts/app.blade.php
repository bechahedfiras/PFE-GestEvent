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
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
  />
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
                                        <a class="page-scroll" href="{{ url('/events')}}">{{__('app.events')}}</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ url('/contact') }}">{{__('app.contact')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ url('/cart-List') }}"><i class="fa-solid fa-cart-shopping"></i> {{$total}}</i></a>
                                    </li>
                                </ul>
                                
                                @if (!Auth::user())
                                    <a class="main-btn mr-3" href="{{ route('login') }}">{{__('app.Sign in')}}</a>
                                    <a class="main-btn" href="{{ route('register') }}">{{__('app.Sign up')}}</a>
                                @else
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                        style="color: aliceblue" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @can('manage-users')
                                            <a href="{{ route('admin.users.index') }}" class="dropdown-item">{{__('app.dashboard')}}</a>
                                        @endcan
                                        <a href="{{ route('users.edit-profile') }}" class="dropdown-item">{{__('app.my profile')}}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('app.Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                    </li>
                                @endif

                               
                            </div>

                            <div class="btn-group ml-3">
                                <button type="button" class="btn btn-primary mr-3 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    
                                    {{ LaravelLocalization::getCurrentLocaleNative() }}
                                    
                                </button>
                                <div class="dropdown-menu">
                                  
                                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                                  @endforeach
                                </div>
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
                                    <h5 class="f-title"></h5>
                                    <p class="text">{{__('app.emplacement')}}
                                        </p>
                                    <a class="contact-link" href="{{ url('/contact') }}">{{__('app.location')}}</a>
                                </div> <!-- footer address -->
                            </div>
                            <div class="col-lg-6">
                                <div class="footer-contact mt-40">
                                    <h5 class="f-title">{{__('app.Social Connection')}}</h5>
                                    <p class="text">{{__('app.Dont miss')}}</p>
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
    <script>
        var days = '{{__('app.days')}}';
        $('[data-countdown]').each(function() {
                var $this = $(this), finalDate = $(this).data('countdown');
                    $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime('<div class="header-countdown pt-70 d-flex justify-content-center"><div class="single-count-content count-color-1"><span class="count">%D</span><p class="text">{{__('app.days')}}</p></div><div class="single-count-content count-color-2"><span class="count">%H</span><p class="text">{{__('app.hours')}}</p></div><div class="single-count-content count-color-3"><span class="count">%M</span><p class="text">{{__('app.minutes')}}</p></div><div class="single-count-content count-color-4"><span class="count">%S</span><p class="text">{{__('app.seconds')}}</p></div></div>'));
                });
            });
    </script>
</body>

</html>
