@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-muted">Liste of Events</h3>
                </div>
                @if (session('alert_scc'))
                <br>
                <div class="alert alert-success m-auto w-25 text-center">
                    {{ session('alert_scc') }}
                </div>
                @endif @if (session('alert_err'))
                <br>
                    <div class="alert alert-danger m-auto w-25 text-center">
                        {{ session('alert_err') }}
                    </div>
                @endif
                
                <div class="text-right">
                        <a href="{{url('admin/events/create ')}}">
                         <button  type="submit" class="btn btn-success m-3">add new event</button>
                    </a>
                </div>
                    
                <div class="card-body">
                    {{-- <div class="row">
                        @foreach ($events as $event)
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{asset('storage'.$event->photo)}}" style="height:100%; width:100%;" class="card-img-top" >
                                        <div class="card-body">
                                        <h5 class="card-title">{{$event->label}}</h5>
                                        <p class="card-text">{{$event->price}} DT</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div> --}}
                    



                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">label</th>
                            <th scope="col">price</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">action</th>
                          </tr>
                        </thead>
                       
                      
                        <tbody>
                            <tbody>
                                @foreach ($events as $event)
                               
                                <tr>
                                    <th scope="row"> {{$event->id}}</th>
                                    <td>{{$event->label}}</td>
                                    <td>{{$event->price}}</td>
                                    <td>{{$event->created_at}}</td>
                                    <td>{{$event->updated_at}}</td>
                                    <td>
                                       
                                        <form action="{{url('admin/events/'.$event->id)}}" method="post">
                                            <a href="{{url('admin/events/'.$event->id.'/edit')}}">
                                                <button type="button" class="btn btn-primary">editer</button></a>
    
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
    
                                        
                                       <button type="submit" class="btn btn-danger">delete</button></a>
                                    </td>
                                    
                                        </form>
                                    </td>
                                  </tr>
                                @endforeach
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
