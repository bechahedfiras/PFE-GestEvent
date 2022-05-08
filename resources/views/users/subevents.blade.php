@extends('layouts.app')
@section('content')
    <div class="top-spacer">

    </div>

    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-12">
                <!-- Featured blog post-->
                <a href="#!"><img class="card-img-top" src="{{ asset('../storage/' . $event->photo) }}" alt="..." /></a>

            </div>
            <div class="col-12">
                <div class="mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{ $event->label }}</h2>
                        <p class="card-text">{{ $event->description }}</p>
                        <div data-countdown="{{ trim($event->dateevent) }}" class="w-100"></div>
                        <form action="{{ url('/add-to-cart') }}" method="POST">
                            @csrf
                            {{-- <input type="hidden" name="user_id" value="{{$event->id}}"> --}}
                            <div class="card-footer border-top-0 bg-transparent">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">

                                <div class="text-center"><button type="submit" class="btn btn-primary mt-auto">ADD TO
                                        CART</button></div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <div class="section-title-header text-center mb-4">
                        <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Sub Events</h1>
                    </div>
                </div>


                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach ($subevents as $subevent)
                        <div class="col-4">
                            <!-- Blog post-->

                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top"
                                        src="{{ asset('../storage/' . $subevent->photo) }}" alt="..." /></a>
                                <div class="card-body">
                                    <h2 class="card-title h4">{{ $subevent->label }}</h2>
                                    <p class="card-text">{{ $subevent->description }}</p>
                                    <form action="{{ url('/add-sub-event-to-cart') }}" method="POST">
                                        @csrf
                                        {{-- <input type="hidden" name="user_id" value="{{$event->id}}"> --}}
                                        <div class="card-footer border-top-0 bg-transparent">
                                            <input type="hidden" name="event_id" value="{{ $subevent->id }}">
                                            <div class="text-center"><button type="submit"
                                                    class="btn btn-primary mt-auto">ADD TO
                                                    CART</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
            <div class="container">
                <h5 class="section-title h1 text-center">TEAM</h5>
                <div class="row">
                    <!-- Team member -->
                    @foreach ($eventOgrs as $eventOgr)
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="image-flip">
                                <div class="mainflip flip-0">
                                    <div class="frontside">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <p><img class=" img-fluid"
                                                        src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_01.png"
                                                        alt="card image"></p>
                                                <h4 class="card-title">{{ $eventOgr->user->name }}</h4>
                                                <p class="card-text">{{ $eventOgr->id }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            @endsection
