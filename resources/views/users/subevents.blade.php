@extends('layouts.app')
@section('content')
  {{-- CDN MDB --}}
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet" />

    {{-- END CDN MDB --}}
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
                   

      
      

         
            <section>
                <div class="row d-flex justify-content-center">
                  <div class="col-md-10 col-xl-8 text-center">
                    <h3 class="mb-4">TEAM</h3>
                    <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
                      numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
                      quisquam eum porro a pariatur veniam.
                    </p>
                  </div>
                </div>
              
                <div class="row text-center">
                    @foreach ($eventOgrs as $eventOgr)
                  <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
                    <div class="card testimonial-card ">
                      <div class="card-up" style="background-color: #9d789b;  "></div>
                      <div class="avatar mx-auto bg-white ">
                        <img src="{{ asset('../storage/' . $eventOgr->user->profile_pic) }}"
                          class="rounded img-fluid"  style="width:auto; height: 20rem;"/>
                      </div>
                      <div class="card-body">
                        <h4 class="mb-4">{{ $eventOgr->user->name }}</h4>
                        <hr />
                        <p class="dark-grey-text mt-4">
                          <i class="fas fa-quote-left pe-2"></i>{{ $eventOgr->user->email }}
                        </p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </section>
     
       
          </div>
        </div>
      </div>
 
    </div>
    <!-- Inner -->
</div>
</div>
  <!-- Carousel wrapper -->



                        {{-- <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="image-flip">
                                <div class="mainflip flip-0">
                                    <div class="frontside">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <p><img class=" img-fluid"
                                                  
                                                        src="{{ asset('../storage/' . $eventOgr->user->profile_pic) }}"
                                                        alt="card image"></p>
                                                <h4 class="card-title">{{ $eventOgr->user->name }}</h4>
                                                <p class="card-text">{{ $eventOgr->id }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                   
                </div>
              
                  {{-- CDN MDB --}}
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet" />

    {{-- END CDN MDB --}}
            @endsection
