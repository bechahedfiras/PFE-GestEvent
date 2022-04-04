@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="card">
      <div class="card-header"><h3>put your new event here</h3></div>
      <div class="card-body">
          <form action=" {{url('admin/events')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="form-group">
                <label for="">event label </label>
                  <input type="text" class="form-control form-control-primary"  name="label"  placeholder="put your label here" required>
              </div>
           
              <div class="form-group">
                <label for="">event price <span><i class="ik ik-dollar-sign"></i></span> </label>
                  <input type="number" class="form-control form-control-primary"  name="price"  placeholder="price here" min="0" max="100">
              </div>

              <div class="form-group">
                <label>File upload</label>
                 <input type="file" name="photo" class="form-control form-control-primary" >
              </div>
             <input type="submit" class="form-control form-control-primary" value="enregistrer" >
          <form>
   </div>
  </div>
</div>
@endsection
