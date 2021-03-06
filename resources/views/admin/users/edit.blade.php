@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier L'utilisateur  <b> {{ $users->email }}</b></div>

                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $users) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="name" class="col-md-6 col-form-label ">{{ __('Nom') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') ?? $users->name }}" required autocomplete="name"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-6 col-form-label ">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') ?? $users->email }}" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-6 col-form-label ">{{ __('Facult??') }}</label>

                                <div class="col-md-12">
                                    <select class="form-control" name="faculte_id" class="form-control" required>
                                        @foreach($facs  as $f)
                                            <option value="{{$f->id}}" {{$f->id==$users->faculte_id ? "selected" :""}}>{{$f->label}}</option>
                                        @endforeach
                                    </select>

                                    @error('faculte_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            @foreach ($roles as $role)
                                <div class="form-group form-check">
                                    <input type="checkbox" name="roles[]" id="{{ $role->id }}" class="form-check-input"
                                        value="{{ $role->id }}"
                                        @foreach ($users->roles as $userRole) @if ($userRole->id == $role->id) checked @endif
                                        @endforeach>
                                    <label for="{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                                </div>

                            @endforeach
                            <button type="submit" class="btn btn-primary">Modifier les informations</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
