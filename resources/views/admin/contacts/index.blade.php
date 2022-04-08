@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-muted">Les messages support</h3>
                </div>
                @if (session('alert_scc'))
                <br>
                <div class="alert alert-success m-auto w-100 text-center">
                    {{ session('alert_scc') }}
                </div>
                @endif @if (session('alert_err'))
                <br>
                    <div class="alert alert-danger m-auto w-100 text-center">
                        {{ session('alert_err') }}
                    </div>
                @endif
                
               
                    
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">nom</th>
                            <th scope="col">email</th>
                            <th scope="col">sujet</th>
                            <th scope="col">nombre</th>
                            <th scope="col">message</th>
                            <th scope="col">actions</th>
                          </tr>
                        </thead>
                       
                      
                        <tbody>
                            @foreach ($contacts as $contact)
                           
                            <tr>
                                <th scope="row"> {{$contact->id}}</th>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{$contact->number}}</td>
                                <td>{{$contact->message}}</td>
                                <td>
                                   
                                    <form action="{{url('contact/'.$contact->id.'')}}" method="post">
                                        

                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    
                                   <button type="submit" class="btn btn-danger ">Supprimer <span></span></button></a>
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
