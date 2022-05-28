@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter un utilisateur  <b> </b></div>
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
                    <div class="card-body">
                        <form action="{{url('admin/users')}}" method="POST">
                            @csrf
                           

                            <div class="form-group row">
                                <label for="name" class="col-md-6 col-form-label ">{{ __('Nom') }}</label>

                                <div class="col-md-12">
                                    <input  type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="" required autocomplete="name"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-6 col-form-label ">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                  <!-- Password -->
                  <div class="form-group row">
                                
                    <label for="pwd" class="col-md-6 col-form-label ">{{ __('password') }}</label>
                    <div class="col-md-12">
                    <input id="password" placeholder="{{ __('register.Password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>





                            <div class="form-group row">
                                <label for="email" class="col-md-6 col-form-label ">{{ __('Faculté') }}</label>

                                <div class="col-md-12">
                                    
                                    <select class="form-control" name="faculte_id" class="form-control @error('faculte') is-invalid @enderror" required>
                                        <option value=""></option>
                                        @foreach($facs  as $f)
                                            <option value="{{$f->id}}">{{$f->label}}</option>
                                        @endforeach
                                    </select>
                                    @error('faculte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @error('faculte_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                    @enderror
                                    {{-- </div> </div>
                                    @foreach ($roles as $role)
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="roles[]" id="{{ $role->id }}" class="form-check-input"
                                            value="{{ $role->id }}"
                                            @foreach ($users->roles as $userRole) @if ($userRole->id == $role->id) checked @endif
                                            @endforeach>
                                        <label for="{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                                    </div>
    
                                @endforeach --}}
                                </div>
                            </div>

                         
                            <button type="submit" class="btn btn-primary">Ajouter un utilisateur</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
