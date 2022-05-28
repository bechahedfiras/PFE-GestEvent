@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-muted">Listes des utilisateurs</h3>
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
                        <form action="{{ url('users') }} " method="get">
                            @csrf

                            <div class="input-group py-5 px-5  ">
                                <div class="form-outline">
                                    <input type="text" id="search-input" class="form-control " type="search" id="form1"
                                        placeholder="search by name & email " name="Keyword"
                                        value="{{ is_string($value = request('keyword')) ? $value : '' }}">
                                </div>
                                <button type="submit" id="search-button" type="button" class="btn btn-danger">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>

                        <div class="text-right">
                            <a href="{{ url('admin/users/create') }}">
                                <button type="submit" class="btn btn-success m-3">Ajouter</button>
                            </a>
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
                                            <th scope="row"> {{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->faculte_id)
                                                    <a class="text-primary"
                                                        href="{{ asset('admin/faculte/') }}/{{ $user->faculte_id }}/edit">{{ $user->getFaculte->label }}</a>
                                                @else
                                                    Pas de faculte
                                                @endif
                                            </td>
                                            <td>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', $user->id) }}"><button
                                                        class="btn btn-primary">Modifier</button></a>
                                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
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

@section('scripts')
@stop
