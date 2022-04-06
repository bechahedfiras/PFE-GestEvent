<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Eventify - Event and Conference</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href={{asset('/template/images/favicon.png" type="image/png')}}>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href={{asset('/template/css/bootstrap.min.css')}}>

    <!--====== Flaticon css ======-->
    <link rel="stylesheet" href={{asset('/template/css/flaticon.css')}}>

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href={{asset('/template/css/LineIcons.css')}}>

    <!--====== Animate css ======-->
    <link rel="stylesheet" href={{asset('/template/css/animate.css')}}>

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href={{asset('/template/css/magnific-popup.css')}}>

    <!--====== Slick css ======-->
    <link rel="stylesheet" href={{asset('/template/css/slick.css')}}>

    <!--====== Default css ======-->
    <link rel="stylesheet" href={{asset('/template/css/default.css')}}>

    <!--====== Style css ======-->
    <link rel="stylesheet" href={{asset('/template/css/style.css')}}>


</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area navbar-two" style="background: linear-gradient(to right, #102baf 0%, #1664ff 100%);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg ">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src={{asset('/template/images/logo.png')}} alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                                <ul class="navbar-nav m-auto">
                                    
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#gallery">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">Contact</a>
                                    </li>
                                </ul>
                                
                                    <a class="main-btn" href="{{ route('login') }}">Sign in</a>
                                    
                                    <a class="main-btn" href="{{ route('register') }}">Sign up</a>
                                        
                                    
                                
                            </div>

                            
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

        <div id="home" class="header-content-area bg_cover d-flex align-items-center" style="background-image: url({{asset('/template/images/header-bg.jpg')}})">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div data-countdown="2022/10/01"></div>
                        
                        <div class="header-content text-center">
                            <h2 class="header-title">25 <sup>th</sup> Designers Meetup</h2>
                            <h3 class="sub-title">25 September, 2022 in New York</h3>

                            
                        </div>  <!-- header content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header content -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    

    

    <!--====== GALLERY PART START ======-->

    <section id="gallery" class="event-gallery pt-115 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-50">
                        <h2 class="title">Event Gallery</h2>
                        <p class="text">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem reiciendis odit sed, vero amet blanditiis cule dicta iriure at phaedrum.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        @foreach ($galleries as $gallery)
        <div class="row no-gutters">
            <div class="col-lg-6">
                <div class="single-gallery">
                    <div class="gallery-image">
                        <img src="{{asset('../storage/'.$gallery->photo1)}}" alt="Gallery">
                    </div>
                    <div class="gallery-content">
                        <a class="image-popup" href="assets/images/gallery-1.jpg"><i class="lni-plus"></i></a>
                    </div>
                </div> <!-- single gallery -->
            </div>
            
            <div class="col-lg-6">
                <div class="row no-gutters">
                    <div class="col-sm-6">
                        <div class="single-gallery">
                            <div class="gallery-image">
                                <img src="{{asset('../storage/'.$gallery->photo2)}}" alt="Gallery">
                            </div>
                            <div class="gallery-content">
                                <a class="image-popup" href="assets/images/gallery-2.jpg"><i class="lni-plus"></i></a>
                            </div>
                        </div> <!-- single gallery -->
                    </div>
                    <div class="col-sm-6">
                        <div class="single-gallery">
                            <div class="gallery-image">
                                <img src="{{asset('../storage/'.$gallery->photo3)}}" alt="Gallery">
                            </div>
                            <div class="gallery-content">
                                <a class="image-popup" href={{asset('/template/images/gallery-3.jpg')}}><i class="lni-plus"></i></a>
                            </div>
                        </div> <!-- single gallery -->
                    </div>
                    <div class="col-sm-6">
                        <div class="single-gallery">
                            <div class="gallery-image">
                                <img src="{{asset('../storage/'.$gallery->photo4)}}" alt="Gallery">
                            </div>
                            <div class="gallery-content">
                                <a class="image-popup" href={{asset('/template/images/gallery-4.jpg')}}><i class="lni-plus"></i></a>
                            </div>
                        </div> <!-- single gallery -->
                    </div>
                    <div class="col-sm-6">
                        <div class="single-gallery">
                            <div class="gallery-image">
                                <img src="{{asset('../storage/'.$gallery->photo5)}}" alt="Gallery">
                            </div>
                            <div class="gallery-content">
                                <a class="image-popup" href={{asset('/template/images/gallery-5.jpg')}}><i class="lni-plus"></i></a>
                            </div>
                        </div> <!-- single gallery -->
                    </div>
                </div> <!-- row -->
            </div>
           
        </div> <!-- row -->
        @endforeach
        
    </section>

    <!--====== GALLERY PART ENDS ======-->

    <!--====== PRICING PART START ======-->

    <section id="pricing" class="pricing-area pt-115 pb-200">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-20">
                        <h2 class="title">Ticket Pricing</h2>
                        <p class="text">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem reiciendis odit sed, vero amet blanditiis cule dicta iriure at phaedrum.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-pricing text-center mt-30 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="pricing-name">
                            <h4 class="pricing-title">BASIC PASS</h4>
                            <span class="sub-title">Price Excluding 20% VAT</span>
                        </div>
                        <div class="pricing-price">
                            <span>$ 29.00</span>
                            <p class="text">Per Day</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li>Pro  Regular Seating</li>
                                <li>Best Comfortable Seat</li>
                                <li>Coffee Break With Snacks</li>
                                <li>One Workshop For Practise</li>
                                <li>Course Certificate</li>
                            </ul>
                        </div>
                        <div class="pricing-btn">
                            <a class="main-btn" href="#">Buy Ticket</a>
                        </div>
                    </div> <!-- single pricing -->
                </div>
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-pricing active text-center mt-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="pricing-name">
                            <h4 class="pricing-title">STANDARD PASS</h4>
                            <span class="sub-title">Price Excluding 20% VAT</span>
                        </div>
                        <div class="pricing-price">
                            <span>$ 39.00</span>
                            <p class="text">Per Day</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li>Pro  Regular Seating</li>
                                <li>Best Comfortable Seat</li>
                                <li>Coffee Break With Snacks</li>
                                <li>One Workshop For Practise</li>
                                <li>Course Certificate</li>
                            </ul>
                        </div>
                        <div class="pricing-btn">
                            <a class="main-btn main-btn-2" href="#">Buy Ticket</a>
                        </div>
                    </div> <!-- single pricing -->
                </div>
                <div class="col-lg-4 col-md-8 col-sm-9">
                    <div class="single-pricing text-center mt-30 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="pricing-name">
                            <h4 class="pricing-title">PREMIUM PASS</h4>
                            <span class="sub-title">Price Excluding 20% VAT</span>
                        </div>
                        <div class="pricing-price">
                            <span>$ 49.00</span>
                            <p class="text">Per Day</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li>Pro  Regular Seating</li>
                                <li>Best Comfortable Seat</li>
                                <li>Coffee Break With Snacks</li>
                                <li>One Workshop For Practise</li>
                                <li>Course Certificate</li>
                            </ul>
                        </div>
                        <div class="pricing-btn">
                            <a class="main-btn" href="#">Buy Ticket</a>
                        </div>
                    </div> <!-- single pricing -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PRICING PART ENDS ======-->

    <!--====== CLIENT PART START ======-->

    <div id="client" class="client-area pt-115 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-50">
                        <h2 class="title">Event Sponsors</h2>
                        <p class="text">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem reiciendis odit sed, vero amet blanditiis cule dicta iriure at phaedrum.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row client-active">
                <div class="col-lg-3">
                    <div class="single-client">
                        <img src={{asset('/template/images/client-1.png')}} alt="Client">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client">
                        <img src={{asset('/template/images/client-2.png')}} alt="Client">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client">
                        <img src={{asset('/template/images/client-3.png')}} alt="Client">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client">
                        <img src={{asset('/template/images/client-4.png')}} alt="Client">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client">
                        <img src={{asset('/template/images/client-5.png')}} alt="Client">
                    </div> <!-- single client -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

    <!--====== CLIENT PART ENDS ======-->

    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area pt-80 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info pt-40">
                        <div class="section-title pb-10">
                            <h2 class="title">Get In Touch</h2>
                        </div> <!-- section title -->
                        <ul>
                            <li>
                                <div class="single-info d-flex mt-25">
                                    <div class="info-icon">
                                        <i class="lni-envelope"></i>
                                    </div>
                                    <div class="info-content media-body">
                                        <h6 class="info-title">Email address</h6>
                                        <p class="text">contact@yourmail.com</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                            <li>
                                <div class="single-info d-flex mt-25">
                                    <div class="info-icon">
                                        <i class="lni-phone-handset"></i>
                                    </div>
                                    <div class="info-content media-body">
                                        <h6 class="info-title">Phone Number</h6>
                                        <p class="text">+216 99 999 999</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                            <li>
                                <div class="single-info d-flex mt-25">
                                    <div class="info-icon">
                                        <i class="lni-money-location"></i>
                                    </div>
                                    <div class="info-content media-body">
                                        <h6 class="info-title">Location</h6>
                                        <p class="text">Bizerte</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                        </ul>
                        
                    </div> <!-- contact info -->
                </div>
                <div class="col-lg-8">
                    <div class="contact-form pt-20">
                        <form id="contact-form" action="{{url('contact')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form">
                                        <input type="text" name="name" placeholder="Your Name">
                                        <i class="lni-user"></i>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form">
                                        <input type="email" name="email" placeholder="Your Email">
                                        <i class="lni-envelope"></i>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form">
                                        <input type="text" name="subject" placeholder="Your Subject">
                                        <i class="lni-pencil-alt"></i>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form">
                                        <input type="text" name="number" placeholder="Phone Number">
                                        <i class="lni-phone-handset"></i>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form">
                                        <textarea name="message" placeholder="Your Message"></textarea>
                                        <i class="lni-comment-alt"></i>
                                    </div> <!-- single form -->
                                </div>
                                   {{-- flash message --}}
                                @if (session('alert_scc'))
                                <br>
                                <div class="alert alert-success m-auto w-100 text-center">
                                    {{ session('alert_scc') }}
                                </div>
                                @endif @if (session('alert_err'))
                                <br>
                                    <div class="alert alert-danger m-auto w-100 text-center">
                                        {{ session('alert_err') }}
                                    </div>
                                @endif
                                <p class="form-message"></p>
                              
                                <div class="col-md-12">
                                    <div class="single-form">
                                        <button type="submit" class="main-btn main-btn-2">Send Message</button>
                                    </div> <!-- single form -->
                                </div>
                              
                            </div> <!-- row -->
                        </form>
                    </div> <!-- contact form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <section id="footer" class="footer-area bg_cover" style="background-image: url(assets/images/footer.jpg)">
        
        
        <div class="footer-widget">
            <div class="container">
                <div class="widget  pt-80 pb-130">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="footer-address mt-40">
                                <h5 class="f-title">Venue Location</h5>
                                <p class="text">18 - 21 DECEMBER, 2022 <br> 51 Francis Street, Cesare Rosaroll, 118 80139 Eventine</p>
                                <a class="contact-link" href="#">Contact Our Authority</a>
                            </div> <!-- footer address -->
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-contact mt-40">
                                <h5 class="f-title">Social Connection</h5>
                                <p class="text">Don't miss a thing! Receive daily news You should connect social area for Any Proper Updates Anytime</p>
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
        
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p class="text">All Rights Reserved by Us</p>
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- container -->
    </section>

    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======--> 

    <!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->

    <!-- row -->










    <!--====== jquery js ======-->
    <script src={{asset('/template/js/vendor/modernizr-3.6.0.min.js')}}></script>
    <script src={{asset('/template/js/vendor/jquery-1.12.4.min.js')}}></script>

    <!--====== Bootstrap js ======-->
    <script src={{asset('/template/js/bootstrap.min.js')}}></script>
    <script src={{asset('/template/js/popper.min.js')}}></script>

    <!--====== Counter Up js ======-->
    <script src={{asset('/template/js/waypoints.min.js')}}></script>
    <script src={{asset('/template/js/jquery.counterup.min.js')}}></script>

    <!--====== Slick js ======-->
    <script src={{asset('/template/js/slick.min.js')}}></script>

    <!--====== Magnific Popup js ======-->
    <script src={{asset('/template/js/jquery.magnific-popup.min.js')}}></script>

    <!--====== Scrolling Nav js ======-->
    <script src={{asset('/template/js/jquery.easing.min.js')}}></script>
    <script src={{asset('/template/js/scrolling-nav.js')}}></script>

    <!--====== Countdown js ======-->
    <script src={{asset('/template/js/jquery.countdown.min.js')}}></script>

    <!--====== wow js ======-->
    <script src={{asset('/template/js/wow.min.js')}}></script>

    <!--====== Ajax Contact js ======-->
    <script src={{asset('/template/js/ajax-contact.js')}}></script>

    <!--====== Main js ======-->
    <script src={{asset('/template/js/main.js')}}></script>

</body>

</html>
