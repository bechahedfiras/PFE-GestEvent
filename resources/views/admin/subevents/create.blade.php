@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="card">
      <div class="card-header"><h3>Ajouter un Sous événement</h3></div>
      <div class="card-body">
          <form action=" {{url('admin/subevents')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="form-group">
                <label for="">Nom de Sous l'événement </label>
                  <input type="text" class="form-control form-control-primary"  name="label"  placeholder="Nom" required>
              </div>

              <div>
                <label for="">Nom de  l'événement </label>
                  <select class="form-control form-control-primary" name="event" class="form-control @error('event') is-invalid @enderror" required>
                          <option value="">Choisir l'evenement</option>
                          @foreach($events  as $event)
                              <option value="{{$event->id}}">{{$event->label}}</option>
                          @endforeach
                      </select>
             </div>
<br>


              <div class="form-group">
                <label for="">Le prix <span>DT</span> </label>
                  <input type="number" class="form-control form-control-primary"  name="price"  placeholder="Prix" min="0" max="100">
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control form-control-primary" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
              </div>

              
              <div class="form-group">
                <label>Affiche</label>
                 <input type="file" name="photo" class="form-control form-control-primary" >
              </div>
             <input type="submit" class="form-control form-control-primary" value="Ajouter" >
          <form>
   </div>
  </div>
</div>
@endsection
