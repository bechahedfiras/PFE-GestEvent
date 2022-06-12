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

             

              {{-- <div>
                <label for="">Organisateur</label>
                  <select class="form-control form-control-primary" name="event" class="form-control @error('event') is-invalid @enderror" required>
                    @foreach($eventOgrs as $eventOgr)
                    <option value="{{ $eventOgr->id }} ">    {{ $eventOgr->name }} </option>
                         
                 
                  @endforeach
                      </select>
             </div> --}}
<br>


           

              <div class="form-group">
                <label for="">Le prix <span>DT</span> </label>
                  <input type="number" class="form-control form-control-primary"  name="price" required  placeholder="Prix" min="0" max="100">
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control form-control-primary" id="exampleFormControlTextarea1" required rows="3" name="description"></textarea>
              </div>

              <div class="form-group">
                <label for="">La date de l'événement</label>
                  <input type="date" class="form-control form-control-primary" required  name="dateevent"  
                  data-date-format=" YYYY MMMM DD  " >
              </div>

              <div class="form-group">
                <label for="">Le lieux  </label>
                  <input type="texte" class="form-control form-control-primary"  name="lieux" required  placeholder="lieux" >
              </div>
              <div class="form-group">
                <label>Affiche</label>
                 <input type="file" name="photo" class="form-control form-control-primary" required >
              </div>
             <input type="submit" class="form-control form-control-primary" value="Ajouter" required >
          <form>
   </div>
  </div>
</div>
@endsection
