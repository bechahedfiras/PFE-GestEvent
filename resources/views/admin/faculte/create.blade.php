@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="card">
      <div class="card-header"><h3>Ajouter une faculté</h3></div>
      <div class="card-body">
          <form action=" {{url('admin/faculte/store')}}" method="post">
            {{ csrf_field() }}
              <div class="form-group">
                
                  <input type="text" class="form-control form-control-primary"  name="label"  placeholder="nom de faculté">
              </div>
           
             <input type="submit" class="form-control form-control-primary" value="Ajouter" >
          <form>
   </div>
  </div>
</div>
@endsection
