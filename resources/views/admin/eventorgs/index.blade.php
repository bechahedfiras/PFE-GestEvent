@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-muted">Listes des évènements</h3>
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
                        <a href="{{url('admin/eventorgs/create ')}}">
                         <button  type="submit" class="btn btn-success m-3">Ajouter</button>
                    </a>
                </div>
                    
                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">event_name</th>
                            <th scope="col">user_name</th>

                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">actions </th>
                          </tr>
                        </thead>
                       
                      
                        <tbody>
                            <tbody>
                                @foreach ($eventorgs as $eventorg)
                               
                                <tr>
                                    <th scope="row"> {{$eventorg->id}}</th>
                        
                                    <td>{{$eventorg->event->label}}</td>
                                    <td>{{$eventorg->user->name}}</td>
                                    <td>{{$eventorg->created_at}}</td>
                                    <td>{{$eventorg->updated_at}}</td>
                                    <td>
                                       
                                        <form action="{{url('admin/eventorgs/'.$eventorg->id)}}" method="post">
                                            <a href="{{url('admin/eventorgs/'.$eventorg->id.'/edit')}}">
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
