@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-muted">Listes des Sous évènements</h3>
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
                        <a href="{{url('admin/subevents/create ')}}">
                         <button  type="submit" class="btn btn-success m-3">Ajouter</button>
                    </a>
                </div>
                    
                <div class="card-body">
                    {{-- <div class="row">
                        @foreach ($events as $event)
                                <div class="col">
                                    <div class="card" style="width:18rem;">
                                        <img src="{{asset('../storage/'.$event->photo)}}" style="height:100%; width:100%;" class="card-img-top" >
                                        <div class="card-body">
                                        <h5 class="card-title">{{$event->price}} DT</h5>
                                        <p class="card-text">{{$event->label}}</p>
                                        
                                        <form action="{{url('admin/events/'.$event->id)}}" method="post">
                                            <a href="{{url('admin/events/'.$event->id.'/edit')}}">
                                                <button type="button" class="btn btn-primary">editer <span><i class="ik ik-edit-1"></i></span></button></a>
    
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
    
                                        <button type="submit" class="btn btn-danger">delete <span><i class="ik ik-x-circle"></i></span></button></a>
                                    </td>
                                    
                                        </form>
                                        
                                       
                                        
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div> --}}
                    



                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">details</th>
                            <th scope="col">description</th>
                   
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">action</th>
                          </tr>
                        </thead>
                       
                      
                        <tbody>
                            <tbody>
                                @foreach ($subevents as $subevent)
                               
                                <tr>
                                    <th scope="row"> {{$subevent->id}}</th>
                                    <td> <div class="d-inline-block align-middle">
                                        <img src="{{asset('../storage/'.$subevent->photo)}}" alt="" class="  img-40 align-top mr-15">
                                        <div class="d-inline-block">
                                            <h6>{{$subevent->price}} dt</h6>
                                            <p class="text-muted mb-0">{{$subevent->label}}</p>
                                        </div>
                                    </div>
                                    <td>{{$subevent->description}}</td>
                    
                                    </td>
                                    
                                    <td>{{$subevent->created_at}}</td>
                                    <td>{{$subevent->updated_at}}</td>
                                    <td>
                                       
                                        <form action="{{url('admin/subevents/'.$subevent->id)}}" method="post">
                                            <a href="{{url('admin/subevents/'.$subevent->id.'/edit')}}">
                                                <button type="button" class="btn btn-primary">Modifier <span><i class="ik ik-edit-1"></i></span></button></a>
    
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
    
                                        
                                       <button type="submit" class="btn btn-danger">Supprimer <span><i class="ik ik-x-circle"></i></span></button></a>
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
