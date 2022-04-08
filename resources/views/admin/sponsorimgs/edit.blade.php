@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="card">
      <div class="card-header"><h3>Modifier les images des sponsors de la page d'acceuil</h3></div>
      <div class="card-body">
          <form action=" {{url('admin/sponsorsimg/'.$sponsorimgs->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
              <div class="form-group">
                <label>Image 1</label>
                 <input type="file" name="photo1" class="form-control form-control-primary" >
              </div>
              <div class="form-group">
                <label>Image 2</label>
                 <input type="file" name="photo2" class="form-control form-control-primary" >
              </div>
              <div class="form-group">
                <label>Image 3</label>
                 <input type="file" name="photo3" class="form-control form-control-primary" >
              </div>
              <div class="form-group">
                <label>Image 4</label>
                 <input type="file" name="photo4" class="form-control form-control-primary" >
              </div>
              <div class="form-group">
                <label>Image 5</label>
                 <input type="file" name="photo5" class="form-control form-control-primary" >
              </div>
             <input type="submit" class="form-control form-control-primary" value="Modifier" >
          <form>
   </div>
  </div>
</div>
@endsection