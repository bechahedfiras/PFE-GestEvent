@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-muted">Listes des images gallerie de la page d'acceuil</h3>
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
                <div class="text-right">
                    <a href="{{url('admin/gallery/create ')}}">
                     <button  type="submit" class="btn btn-success m-3">Ajouter</button>
                </a>
            </div>
               
                    
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Photos 1</th>
                            <th scope="col">Photos 2</th>
                            <th scope="col">Photos 3</th>
                            <th scope="col">Photos 4</th>
                            <th scope="col">Photos 5</th>
                            <th scope="col">Actions </th>
                          </tr>
                        </thead>
                       
                      
                        <tbody>
                            @foreach ($galleries as $gallery)
                            <td>{{$gallery->id}}</td>
                            <td> <div class="d-inline-block align-middle">
                                <img src="{{asset('../storage/'.$gallery->photo1)}}" alt="" class="  img-40 align-top mr-15">
                            </div>
                            </td>
                            <td> <div class="d-inline-block align-middle">
                                <img src="{{asset('../storage/'.$gallery->photo2)}}" alt="" class="  img-40 align-top mr-15">
                            </div>
                            </td>
                            <td> <div class="d-inline-block align-middle">
                                <img src="{{asset('../storage/'.$gallery->photo3)}}" alt="" class="  img-40 align-top mr-15">
                            </div>
                            </td>
                            <td> <div class="d-inline-block align-middle">
                                <img src="{{asset('../storage/'.$gallery->photo4)}}" alt="" class="  img-40 align-top mr-15">
                            </div>
                            </td>
                            <td> <div class="d-inline-block align-middle">
                                <img src="{{asset('../storage/'.$gallery->photo5)}}" alt="" class="  img-40 align-top mr-15">
                            </div>
                            </td>
                            <td>
                                       
                                <form action="{{url('admin/gallery/'.$gallery->id)}}" method="post">
                                    <a href="{{url('admin/gallery/'.$gallery->id.'/edit')}}">
                                        <button type="button" class="btn btn-primary">Modifier <span><i class="ik ik-edit-1"></i></span></button></a>

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                               <button type="submit" class="btn btn-danger">Supprimer <span><i class="ik ik-x-circle"></i></span></button></a>
                            </td>

                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
