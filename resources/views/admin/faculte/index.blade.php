@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste fac</div>

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
                                    <a href="{{url('admin/faculte/'.$fac->id.'/edit')}}">
                                        <button class="btn btn-primary">editer</button></a>
                                    <form action="{{url('admin/faculte/'.$fac->id.'/delete')}}" method="post">

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
