@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste fac</div>
                
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{url('admin/faculte/create')}}">
                             <button  type="submit" class="btn btn-success">add new fac</button></a>
                    </div><br>
                   
                </div>
                <div class="card-body">
                   

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">label</th>
                            <th scope="col">action</th>
                          </tr>
                        </thead>
                       
                      
                        <tbody>
                            @foreach ($facs as $fac)
                           
                            <tr>
                                <th scope="row"> {{$fac->id}}</th>
                                <td>{{$fac->label}}</td>
                                <td>
                                   
                                    <form action="{{url('admin/faculte/'.$fac->id.'/delete')}}" method="post">
                                        <a href="{{url('admin/faculte/'.$fac->id.'/edit')}}">
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
