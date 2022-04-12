@extends('layouts.app')

@section('content')
<div class="top-spacer">

</div>

             <div class="row">
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
                        @endforeach
          




@endsection