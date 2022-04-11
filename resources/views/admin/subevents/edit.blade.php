@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="card">
      <div class="card-header"><h3>Modifier <b>{{$subevent->label}}</b></h3></div>
      <div class="card-body">
          <form action=" {{url('admin/subevents/'.$subevent->id)}}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="_method" value="PUT">
              <div class="form-group">
                <label for="">Nom de Sous événement </label>
                  <input type="text" class="form-control form-control-primary"  value="{{$subevent->label}}" name="label"  placeholder="put your label here" required>
              </div>
           
              <div class="form-group">
                <label for="">Prix <span><i class="ik ik-dollar-sign"></i></span> </label>
                  <input type="number" class="form-control form-control-primary" value="{{$subevent->price}}"  name="price"  placeholder="price here" min="0" max="100">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control form-control-primary"  rows="3" name="description">{{$subevent->description}}</textarea>
              </div>

              <div class="form-group">
                <label for="">Le lieux  </label>
                  <input type="texte" class="form-control form-control-primary" value="{{$subevent->lieux}}" name="lieux"  placeholder="lieux" >
              </div>
              
              <div class="form-group">
                <label>Affiche de l'événement</label><br>
                <img  src="{{asset('../storage/'.$subevent->photo)}}"   class=" rounded img-40 align-top mr-15">
                <br> <br>
              
                  <div class="form-group">
                <label>Image de l'evenement</label>
                 <input type="file" name="photo" class="form-control form-control-primary" >
              </div>
                
                 
              </div>

             <input type="submit" class="form-control form-control-primary" value="Modifier" >
          <form>
   </div>
  </div>
</div>
@endsection
