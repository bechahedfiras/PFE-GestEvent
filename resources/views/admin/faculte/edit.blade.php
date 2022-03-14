@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="card">
      <div class="card-header"><h3>put your new fac</h3></div>
      <div class="card-body">
          <form action=" {{url ('admin/faculte')}}" method="post">
              <div class="form-group">
                <label for="">Titre </label>
                  <input type="text" class="form-control form-control-primary" value=""  name="modifier le nom de fac"  placeholder="modifier le nom de fac">
              </div>
           
             <input type="submit" class="form-control form-control-primary" value="modifier" >
          <form>
   </div>
  </div>
</div>
@endsection
