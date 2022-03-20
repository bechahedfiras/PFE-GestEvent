@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-muted">Liste users</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Faculte</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                           
                            <tr>
                                <th scope="row"> {{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->faculte_id)
                                        <a class="text-primary"  href="{{asset('admin/faculte/')}}/{{$user->faculte_id}}/edit">{{$user->getFaculte->label}}</a>
                                    @else
                                        Pas de faculte
                                    @endif
                                </td>
                                <td>{{ implode( ', ', $user->roles()->get()->pluck('name')->toArray() ) }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id)}}"><button class="btn btn-primary">editer</button></a>
                                    <form action="{{ route('admin.users.destroy', $user->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning">Supprimer</button>
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
