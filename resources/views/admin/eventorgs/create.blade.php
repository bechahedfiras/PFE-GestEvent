@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="card">
      <div class="card-header"><h3>Ajouter un organisateur a un  événement</h3></div>
      <div class="card-body">
          <form action=" {{url('admin/eventorgs')}}" method="post" ">
            {{ csrf_field() }}

              <div class="form-group">
                <label for="">Nom de l'événement </label>
                <select class="form-control form-control-primary" name="event" class="form-control" required>
                    @foreach($events as $event)
                    <option value="{{$event->id}}">{{ $event->label }}</option>
                  @endforeach
                      </select>
              </div>

              <div>
                <label for="">Organisateur</label>
                  <select class="form-control form-control-primary" name="user" class="form-control @error('event') is-invalid @enderror" required>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">    {{ $user->name }} </option>
                  @endforeach
                      </select>
             </div>
<br>


           

             
             <input type="submit" class="form-control form-control-primary" value="Ajouter" >
          <form>
   </div>
  </div>
</div>
@endsection
