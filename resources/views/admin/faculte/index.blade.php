@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-muted">Listes des facultés</h3>
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

                <form action="{{url('admin/faculte/')}}  " method="get">
                    @csrf
                   
                    <div class="input-group py-5 px-5  ">
                        <div class="form-outline">
                            <input type="text" id="search-input"   class="form-control " type="search" id="form1"
                             placeholder="Recherche par nom"
                            name="Keyword" value="{{is_string ($value =request('keyword'))? $value:''}}"
                          >
                        </div>
                        <button type="submit" id="search-button" type="button" class="btn btn-danger">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </form>

                <div class="text-right">
                        <a href="{{url('admin/faculte/create')}}">
                         <button  type="submit" class="btn btn-success m-3">Ajouter</button>
                    </a>
                </div>
                    
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">action</th>
                          </tr>
                        </thead>
                       
                      
                        <tbody>
                            @foreach ($facs as $fac)
                           
                            <tr>
                                <th scope="row"> {{$fac->id}}</th>
                                <td>{{$fac->label}}</td>
                                <td>{{$fac->created_at}}</td>
                                <td>{{$fac->updated_at}}</td>
                                <td>
                                   
                                    <form action="{{url('admin/faculte/'.$fac->id.'/delete')}}" method="post">
                                        <a href="{{url('admin/faculte/'.$fac->id.'/edit')}}">
                                            <button type="button" class="btn btn-primary">Modifier</button></a>

                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    
                                   <button type="submit" class="btn btn-danger">Supprimer</button></a>
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
