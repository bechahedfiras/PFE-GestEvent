@extends('layouts.app')

@section('content')
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css"
  rel="stylesheet"
/>
<style>

.fas.fa-heart:hover {
  color: #3672f4 !important;
}

.fas.fa-share-alt:hover {
  color: #0d47a1 !important;
}
body {
	background-color: #bdbdbd;
}

.card.booking-card.v-2 {
  background-color: #ffffff;
}
</style>

<div class="top-spacer ">


  </div>






        <div class="row">

                <div class="col">
                    <div class="card ml-30" style="width:100rem;">
                        <img src="{{asset('../storage/'.$event->photo)}}" style="height:100%; width:100%;" class="card-img-top" >
                        <div class="card-body">
                        <h5 class="card-title">{{$event->price}} DT</h5>
                        <p class="card-text"><h1>{{$event->label}}</h1></p>
                        <p class="card-text">{{$event->description}}</p>
                   </div>
               </div>
             <br>
        </div>
{{-- --------------------------------------------------- --}}
        
<div class="container">
    <div class="row justify-content-center mb-3 py-5 gy-4 ">
     @foreach ($subevents as $subevent)
        <div class="col-sm-md-5 col-xl-5 py-12 ">
        
      <div class="card booking-card v-2 mt-2 mb-4 rounded-bottom h-100  ">
        <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
          <img src="{{asset('../storage/'.$subevent->photo)}}" class="img-fluid">
          <a href="#!">
            <div class="mask" style="background-color: rgba(6, 6, 6, 0.15);"></div>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title font-weight-bold"><a>{{$subevent->label}}</a></h4>
          {{-- <ul class="list-unstyled list-inline mb-2">
            <li class="list-inline-item me-0"><i class="fa fa-star fa-xs"> </i></li>
            <li class="list-inline-item me-0"><i class="fa fa-star fa-xs"></i></li>
            <li class="list-inline-item me-0"><i class="fa fa-star fa-xs"></i></li>
            <li class="list-inline-item me-0"><i class="fa fa-star fa-xs"></i></li>
            <li class="list-inline-item"><i class="fa fa-star-half-alt fa-xs"></i></li>
          </ul> --}}
          <p class="card-text">{{$subevent->description}}</p>
          <hr class="my-4">
          <p class="h5 font-weight-bold mb-4">PRICE {{$subevent->price}} DT</p>
          {{-- <ul class="list-unstyled d-flex justify-content-start align-items-center mb-0">
            <li>Tuesday - Friday</li>
            <li>
              <div class="chip ms-3">10:00AM</div>
            </li>
            <li>
              <div class="chip ms-0 me-0">6:00PM</div>
            </li>
          </ul> --}}
          {{-- <ul class="list-unstyled d-flex justify-content-start align-items-center mb-0">
            <li>Saturday - Sunday</li>
            <li>
              <div class="chip ms-3">9:00AM</div>
            </li>
            <li>
              <div class="chip ms-0 me-0">7:00PM</div>
            </li>
          </ul>
          <ul class="list-unstyled d-flex justify-content-start align-items-center mb-0">
            <li>Monday</li>
            <li>
              <div class="chip ms-3">CLOSED</div>
            </li>
          </ul> --}}
        </div>
    </div>
</div>
@endforeach
    </div>
  </div>
{{-- --------------------------------------------------- --}}
        {{-- <div class="container">
         @foreach ($subevents as $subevent) 
            <section class="mx-auto my-5" style="max-width:50rem;">
   
              <div class="card">
                <div class="card-body d-flex flex-row">
                    
                        <img src="{{asset('../storage/'.$subevent->photo)}}" class="rounded-circle me-3" height="50px"
                        width="50px" alt="avatar" />
                      <div>
                        <h5 class="card-title font-weight-bold mb-2">{{$subevent->label}}</h5>
                        <p class="card-text"><i class="far fa-clock pe-2"></i>{{$subevent->price}} DT</p>
                      </div>
                    </div>
                    <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                      <img class="img-fluid" src="{{asset('../storage/'.$subevent->photo)}}"
                        alt="Card image cap" />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                      </a>
                    </div>
                    <div class="card-body">
                      <p class="card-text collapse" id="collapseContent">
                        {{$subevent->description}}
                      </p>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-link link-danger p-md-1 my-1" data-mdb-toggle="collapse" href="#collapseContent"
                          role="button" aria-expanded="false" aria-controls="collapseContent">Read more</a>
                        <div>
                          <i class="fas fa-share-alt text-muted p-md-1 my-1 me-2" data-mdb-toggle="tooltip"
                            data-mdb-placement="top" title="Share this post"></i>
                          <i class="fas fa-heart text-muted p-md-1 my-1 me-0" data-mdb-toggle="tooltip" data-mdb-placement="top"
                            title="I like it"></i>
                        </div>
                     
                      
                    </div>
                    </div>    
              
              </div>
          
            </section>
            
          </div>
          @endforeach  --}}
         
                {{-- @foreach ($subevents as $subevent)
                                <div class="col ml-15">
                                    <div class="card" style="width:50rem;">
                                        <img src="{{asset('../storage/'.$subevent->photo)}}" style="height:100%; width:100%;" class="card-img-top" >
                                        <div class="card-body">
                                        <h5 class="card-title">{{$subevent->price}} DT</h5>
                                        <p class="card-text">{{$subevent->label}}</p>
                                        <p class="card-text">{{$subevent->description}}</p>

                                        <button type="submit" class="btn btn-danger">Show more <span><i class="ik ik-x-circle"></i></span></button></a>

                                    </div>
                                </div>
                                <br>
                            </div>
                        @endforeach  --}}
          

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"
></script>


@endsection