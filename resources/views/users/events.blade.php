@extends('layouts.app')

@section('content')
 <!-- Favicon-->
 <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
 <!-- Bootstrap icons-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
 <!-- Core theme CSS (includes Bootstrap)-->
 <link href="css/styles.css" rel="stylesheet" />

<section class="py-5">

  <div class="container px-4 px-lg-5 mt-5">
    
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @foreach ($events as $event) 
          <div class="col-4 mb-5">
              <div class="card h-100">
                  <!-- Product image-->
                  <a href="{{url('getsubevents/'.$event->id)}}"><img class="card-img-top" src="{{asset('../storage/'.$event->photo)}}" alt="..." /></a>
                  <!-- Product details-->
                  <div class="card-body p-4">
                      <div class="text-center">
                          <!-- Product name-->
                          <h5 class="fw-bolder"> <a href="{{url('getsubevents/'.$event->id)}}">{{$event->label}}</a></h5>
                          {{$event->price}} $
                      </div>
                  </div>
                  <!-- Product actions-->
                  <form action="{{url('/add-to-cart')}}" method="POST">
                      @csrf
                      {{-- <input type="hidden" name="user_id" value="{{$event->id}}"> --}}
                      <div class="card-footer border-top-0 bg-transparent">
                        <input type="hidden" name="event_id" value="{{$event->id}}">
                        
                        <div class="text-center"><button type="submit" class="btn btn-primary mt-auto">ADD TO CART</button></div>
                      </div>
                  </form>
              </div>
              
          </div>
          @endforeach 
      </div>
      
  </div>
  
</section>

 <!-- Bootstrap core JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 <!-- Core theme JS-->
 <script src="js/scripts.js"></script>
@endsection