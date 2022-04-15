@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="card">
      <div class="card-header"><h3>Ajouter un événement</h3></div>
      <div class="card-body">
          <form action=" {{url('admin/events')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="form-group">
                <label for="">Nom de l'événement </label>
                  <input type="text" class="form-control form-control-primary"  name="label"  placeholder="Nom" required>
              </div>
           
              <div class="form-group">
                <label for="">Le prix <span>DT</span> </label>
                  <input type="number" class="form-control form-control-primary"  name="price"  placeholder="Prix" min="0" max="100">
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control form-control-primary" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
              </div>
              
                <select class="select" multiple>
                  <option value="1" data-mdb-icon="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-1.webp"
                    >One</option
                  >
                  <option value="2" data-mdb-icon="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-2.webp"
                    >Two</option
                  >
                  <option value="3" data-mdb-icon="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-3.webp"
                    >Three</option
                  >
                  <option value="4" data-mdb-icon="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-4.webp"
                    >Four</option
                  >
                  <option value="5" data-mdb-icon="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"
                    >Five</option
                  >
                </select>


              <div class="form-group">
                <label for="">Le lieux  </label>
                  <input type="texte" class="form-control form-control-primary"  name="lieux"  placeholder="lieux" >
              </div>
              <div class="form-group">
                <label>Image de l'evenement</label>
                 <input type="file" name="photo" class="form-control form-control-primary" >
              </div>
             <input type="submit" class="form-control form-control-primary" value="Ajouter" >
          <form>
   </div>
  </div>
</div>
@endsection
