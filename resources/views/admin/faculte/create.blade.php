@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="card">
      <div class="card-header"><h3>put your new fac</h3></div>
      <div class="card-body">
          <form action=" {{url('admin/faculte/store')}}" method="post">
            {{ csrf_field() }}
              <div class="form-group">
                <label for="">Titre </label>
                  <input type="text" class="form-control form-control-primary"  name="label"  placeholder="put your label here">
              </div>
           
             <input type="submit" class="form-control form-control-primary" value="enregistrer" >
          <form>
   </div>
  </div>
</div>
@endsection
