@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="card">
      <div class="card-header"><h3>Update your new fac</h3></div>
      <div class="card-body w-50 m-auto">
          <form action="{{url('admin/faculte/'.$fac->id)}}" method="post">
          @csrf
                <input type="hidden" name="_method" value="PUT">
              <div class="form-group">
                <label for="">Titre </label>
                  <input type="text" class="form-control text-center" value="{{$fac->label}}"  name="label"  placeholder="modifier le nom de fac">
              </div>
              <button class="w-100 btn btn-danger">Modifier</button>
          <form>
   </div>
  </div>
</div>
@endsection
