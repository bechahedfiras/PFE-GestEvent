@extends('layouts.app')

@section('content')
<div class="top-spacer">

</div>
<div class="container p-100">
    <div class="jumbotron bg-info">
      <h1> Event : {{$event->label}}</h1>      
      <p class="bg-danger text-white blockquote text-center rounded">Description: {{$event->description}}</p>
    </div>     
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
         
                @foreach ($subevents as $subevent)
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
                        @endforeach 
          




@endsection