@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="card">
      <div class="card-header"><h3>Ajouter un organisateur a un  événement</h3></div>
      <div class="card-body">
          <form action=" {{url('admin/eventorgs/'.$eventorg->id)}}"  method="POST" >
            @csrf
            @method('PATCH')

              <div class="form-group">
                <label for="">Nom de l'événement </label>
                <select class="form-control form-control-primary" name="event" class="form-control" required>
                   
                    <option value="{{ $eventorg->event_id }} ">    {{ $eventorg->event->label }} </option>
                         
                 
   
                      </select>
              </div>

             

              <div>
                <label for="">Organisateur</label>
                  <select class="form-control form-control-primary" name="user" class="form-control " required>
                    <option value="{{ $eventorg->user_id }} ">    {{ $eventorg->user->name }} </option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }} ">    {{ $user->name }} </option>
                 
                  @endforeach
                      </select>
             </div>
<br>


           

             
             <input type="submit" class="form-control form-control-primary" value="MIse A jour" >
            </form>
   </div>
  </div>
</div>
@endsection
