@extends('layouts.app')

@section('content')
<div class="top-spacer">

</div>

             <div class="row">
                 
                @foreach ($subevents as $subevent)
                                <div class="col">
                                    <div class="card" style="width:25rem;">
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