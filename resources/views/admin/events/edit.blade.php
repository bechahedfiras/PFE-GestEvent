@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="card">
      <div class="card-header"><h3>Modifier <b>{{$event->label}}</b></h3></div>
      <div class="card-body">
          <form action=" {{url('admin/events/'.$event->id)}}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="_method" value="PUT">
              <div class="form-group">
                <label for="">Nom de l'événement </label>
                  <input type="text" class="form-control form-control-primary"  value="{{$event->label}}" name="label"  placeholder="put your label here" required>
              </div>
           
              <div class="form-group">
                <label for="">Prix <span><i class="ik ik-dollar-sign"></i></span> </label>
                  <input type="number" class="form-control form-control-primary" value="{{$event->price}}"  name="price"  placeholder="price here" min="0" max="100">
              </div>
              
              <div class="form-group">
                <label>Affiche de l'événement</label>
                 <input type="file" name="photo" class="form-control form-control-primary" >
              </div>

             <input type="submit" class="form-control form-control-primary" value="Modifier" >
          <form>
   </div>
  </div>
</div>
@endsection
