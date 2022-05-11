@extends('layouts.app')
@section('content')
  {{-- CDN MDB --}}
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    
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
            
                <div class="col">
                    <div class="section-title-header text-center mb-4">
                        <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Sub Events</h1>
                    </div>
                


                <!-- Nested row for non-featured blog posts-->
                
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                  @foreach ($subevents as $subevent)
                    <div class="col-4 mb-5   ">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="#"><img class="card-img-top rounded img-fluid"  src="{{asset('../storage/'.$subevent->photo)}}" style=" height: 15rem;" alt="..." /></a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"> <a href="#">{{ $subevent->label }}</a></h5>
                                    {{$subevent->price}} $
                                </div>
                            </div>
                            <!-- Product actions-->
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
                    @endforeach 
                </div>
            
            
                <h5 class="section-title h1 text-center">TEAM</h5>
                
                    <!-- Team member -->
                
                <div class="row text-center">
                    @foreach ($eventOgrs as $eventOgr)
                  <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('../storage/' . $eventOgr->user->profile_pic) }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                      <h5 class="mb-0">{{ $eventOgr->user->name }}</h5>
                    </div>
                    
                  </div>
                  @endforeach
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
    
    {{-- END CDN MDB --}}
            @endsection
