@extends('layouts.app')

@section('content')

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

@endsection


