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
        background-color: #eaeaea;
    }
    
    .card.booking-card.v-2 {
      background-color: #ffffff;
    }
    </style>
<div class="top-spacer">

</div>

   <div class="container">
         @foreach ($events as $event) 
            <section class="mx-auto my-5" style="max-width:50rem;">
   
              <div class="card ">
                <div class="card-body d-flex flex-row ">
               
                        <img src="{{asset('../storage/'.$event->photo)}}" class="rounded-circle me-3" height="50px"
                        width="50px" alt="avatar" />
                      <div>
                        <h5 class="card-title font-weight-bold mb-2">{{$event->label}}</h5>
                        <p class="card-text"> {{$event->price}} DT</p>
                      </div>
                    </div>
                    <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                      <img class="img-fluid" src="{{asset('../storage/'.$event->photo)}}"
                        alt="Card image cap" />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                      </a>
                    </div>
                    <div class="card-body">
                      <p class="card-text collapse" id="collapseContent">
                        {{$event->description}}
                            <form action="{{url('getsubevents/'.$event->id)}}" >
                                <button type="submit" class=" btn btn-link link-danger p-md-1 my-1">Show more info <span><i class="ik ik-x-circle"></i></span></button></a>
                            </form>
                      </p>
                      <div class="d-flex justify-content-between">
                        <a class="btn btn-link link-warning p-md-1 my-1" data-mdb-toggle="collapse" href="#collapseContent"
                          role="button" aria-expanded="false" aria-controls="collapseContent">Read more</a>
                        <div>
                          <form action="{{url('/add-to-cart')}}" method="POST" 
                                class="alert alert-warning text-danger">
                             @csrf
                             {{-- <input type="hidden" name="user_id" value="{{$event->id}}"> --}}
                              <input type="hidden" name="event_id" value="{{$event->id}}">
                              <button type="submit" class="btn btn-danger">ADD TO CART</button>
                        <form>
                   
                            
                            
                          
                        </div>
                     
                      
                    </div>
                    </div>    
              
              </div>
          
            </section>
            
          </div>
          @endforeach 


             {{-- <div class="row">
                        @foreach ($events as $event)
                                <div class="col">
                                    <div class="card" style="width:25rem;">
                                        <img src="{{asset('../storage/'.$event->photo)}}" style="height:100%; width:100%;" class="card-img-top" >
                                        <div class="card-body">
                                        <h5 class="card-title">{{$event->price}} DT</h5>
                                        <p class="card-text">{{$event->label}}</p>
                                        <p class="card-text">{{$event->description}}</p>

                                        <form action="{{url('getsubevents/'.$event->id)}}" >
                                       
    
                                        
                                       <button type="submit" class="btn btn-danger">Show more <span><i class="ik ik-x-circle"></i></span></button></a>
                                   
                                    
                                        </form>
                                       

                                    </div>
                                </div>
                                <br>
                            </div>
                        @endforeach --}}
          



<!-- MDB -->

<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"
></script>
@endsection