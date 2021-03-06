@extends('layouts.app')

@section('content')
    <header class="header-area">
        <div id="home" class="header-content-area bg_cover d-flex align-items-center"
            style="background-image: url({{ asset('/template/images/header-bg.jpg') }})"> 
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($eventss as $event)
                    <div class="col-lg-10">
                        
                        
                        
                        <div data-countdown="{{ trim($event->dateevent) }}"></div>
                        
                        <div class="header-content text-center">
                            <h2 class="header-title">{{ trim($event->label) }}</h2>
                            <h3 class="sub-title "><span class="text-danger"><a href="http://127.0.0.1:8000/fr/getsubevents/1" style="text-decoration:none;">{{ trim($event->label) }}</a></span> a partir de <span class="text-danger">{{ trim($event->price) }} </span> DT</h3>
                            
                            
                        </div> <!-- header content -->
                    </div>
                    @endforeach
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
                        <h2 class="title">{{__('welcome.Event Gallery')}}</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        @foreach ($galleries as $gallery)
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div>
                        <div class="gallery-image">
                            <img src="{{ asset('../storage/' . $gallery->photo1) }}" alt="Gallery">
                        </div>

                    </div> <!-- single gallery -->
                </div>

                <div class="col-lg-6">
                    <div class="row no-gutters">
                        <div class="col-sm-6">
                            <div class="">
                                <div class="gallery-image">
                                    <img src="{{ asset('../storage/' . $gallery->photo2) }}" alt="Gallery">
                                </div>
                            </div> <!-- single gallery -->
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <div class="gallery-image">
                                    <img src="{{ asset('../storage/' . $gallery->photo3) }}" alt="Gallery">
                                </div>

                            </div> <!-- single gallery -->
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <div class="gallery-image">
                                    <img src="{{ asset('../storage/' . $gallery->photo4) }}" alt="Gallery">
                                </div>
                            </div> <!-- single gallery -->
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <div class="gallery-image">
                                    <img src="{{ asset('../storage/' . $gallery->photo5) }}" alt="Gallery">
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

    {{-- <section id="pricing" class="pricing-area pt-115 pb-200">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-20">
                        <h2 class="title">Ticket Pricing</h2>
                        <p class="text">Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent
                            mediocritatem reiciendis odit sed, vero amet blanditiis cule dicta iriure at phaedrum.</p>
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
                                <li>Pro Regular Seating</li>
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
                    <div class="single-pricing active text-center mt-30 wow fadeInUp" data-wow-duration="1s"
                        data-wow-delay="0s">
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
                                <li>Pro Regular Seating</li>
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
                    <div class="single-pricing text-center mt-30 wow fadeInRight" data-wow-duration="1s"
                        data-wow-delay="0s">
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
                                <li>Pro Regular Seating</li>
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
    </section> --}}

    <!--====== PRICING PART ENDS ======-->

    <!--====== CLIENT PART START ======-->

    <div id="client" class="client-area pt-115 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-50">
                        <h2 class="title">{{__('welcome.Event Sponsors')}}</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->

            @foreach ($sponsorimgs as $sponsorimg)
                <div class="row client-active">
                    <div class="col-lg-3">
                        <div class="single-client">
                            <img src={{ asset('../storage/' . $sponsorimg->photo1) }} alt="Client">
                        </div> <!-- single client -->
                    </div>
                    <div class="col-lg-3">
                        <div class="single-client">
                            <img src={{ asset('../storage/' . $sponsorimg->photo2) }} alt="Client">
                        </div> <!-- single client -->
                    </div>
                    <div class="col-lg-3">
                        <div class="single-client">
                            <img src={{ asset('../storage/' . $sponsorimg->photo3) }} alt="Client">
                        </div> <!-- single client -->
                    </div>
                    <div class="col-lg-3">
                        <div class="single-client">
                            <img src={{ asset('../storage/' . $sponsorimg->photo4) }} alt="Client">
                        </div> <!-- single client -->
                    </div>
                    <div class="col-lg-3">
                        <div class="single-client">
                            <img src={{ asset('../storage/' . $sponsorimg->photo5) }} alt="Client">
                        </div> <!-- single client -->
                    </div>
                </div> <!-- row -->
            @endforeach
        </div> <!-- container -->

    </div>


   

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
@endsection
