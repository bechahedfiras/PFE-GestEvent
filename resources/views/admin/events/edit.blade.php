@extends('layouts.admin') @section('content')
<div class="container-fluid">
  @if (session('alert_scc'))
                <br>
                <div class="alert alert-success m-auto w-50 m-auto text-center">
                    {{ session('alert_scc') }}
                </div>
                @endif @if (session('alert_err'))
                <br>
                    <div class="alert alert-danger m-auto w-50 m-auto text-center">
                        {{ session('alert_err') }}
                    </div>
                @endif
    <div class="mb-2">
        <h2 class="text-muted">{{ $event->label }}</h2>
    </div>


    <div class="text-right mb-10 ">
        <button type="button" class="btn btn-danger rounded-pill" data-mdb-toggle="modal" data-mdb-target="#exampleModal"><i class="fa fa-gear"></i></button>
    </div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 ">
            <a href="{{ asset('admin/users') }}">
                <div class="widget">
                    <div class="widget-body ">
                        <div class="d-flex justify-content-between align-items-center ">
                            <div class="state ">
                                <h6>Participents</h6>
                                <h2>15</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <a href="{{ asset('admin/users') }}">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Organisateurs</h6>
                                <h2>10</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row clearfix ">

      <div class="col-6 mb-50 bg-image hover-zoom  rounded-9
      hover-overlay hover-zoom hover-shadow ripple">
        <img src="{{asset('../storage/'.$event->photo)}} "
        class="img-fluid rounded-9  border border-danger cw-100" >
      </div>


     {{-------------------- tab oraganisateur ind ----------------------------}}

      <div class="col-6 mb-50 ">
        <div class="mb-3">
          <h5 class="text-muted text-center ">Les Organisateurs</h5>
        </div>
        <table class="table w-75 h-25  m-auto">
          <thead>
              <tr>
                  <th scope="col">id</th>
                  <th scope="col">Organisateur</th>
                  <th scope="col">Action</th>
              </tr>
          </thead>
          @foreach ($eventOgrs as $eventOgr)
          <tbody>
              <tr>
                  <td>{{ $eventOgr->id }}</td>
                  <td>{{ $eventOgr->user->name }}</td>

                  <form action="{{ url('admin/eventorgs/'.$eventOgr->id) }}" method="post">
                      {{ csrf_field() }} {{ method_field('DELETE') }}

                      <td>
                          <button type="submit" class="btn btn-danger rounded-pill">
                              Delete<span> <i class="ik ik-x-circle"></i></span>
                          </button>
                      </td>
                  </form>
              </tr>
          </tbody>
          @endforeach
        </table>
     {{-------------------- tab sub event ind ----------------------------}}

        <div class="my-3">
          <h5 class="text-muted text-center ">Les Sous Evénements</h5>
        </div>

            <table class="table w-75 h-50  m-auto">
              <thead>
                  <tr>
                    <th scope="col">id</th>
                            <th scope="col">details</th>
                            <th scope="col">description</th>
                   
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">action</th>
                  </tr>
              </thead>
              @foreach ($subevents as $subevent)
                               
              <tr>
                  <th scope="row"> {{$subevent->id}}</th>
                  <td> <div class="d-inline-block align-middle">
                      <img src="{{asset('../storage/'.$subevent->photo)}}" alt="" class="  img-40 align-top mr-15">
                      <div class="d-inline-block">
                          <h6>{{$subevent->price}} dt</h6>
                          <p class="text-muted mb-0">{{$subevent->label}}</p>
                      </div>
                  </div>
                  <td>{{$subevent->description}}</td>
  
                  </td>
                  
                  <td>{{$subevent->created_at}}</td>
                  <td>{{$subevent->updated_at}}</td>
                  <td>
                     
                        <form action="{{url('admin/subevents/'.$subevent->id)}}" method="post">
                          <a href="{{url('admin/subevents/'.$subevent->id.'/edit')}}">
                              <button type="button" class="btn btn-danger rounded-pill">Modifier <span><i class="ik ik-edit-1"></i></span></button></a>


                      
                      
                      </td>
                  
                      </form>
                  </td>
                </tr>
              @endforeach
            </table>
        
        
       


      </div>
    

      
     
</div>

<!-- Modal -->
<div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel" >{{ $event->label }}</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tabs navs -->
                <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                    <li class="nav-item success" role="presentation">
                        <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Update event</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Organisateurs</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3" role="tab" aria-controls="ex1-tabs-3" aria-selected="false">Sous Evénement</a>
                    </li>
                </ul>
                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Modifier l'événement</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action=" {{ url('admin/events/' . $event->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="_method" value="PUT" />
                                            <div class="form-group">
                                                <label for="">Nom de l'événement </label>
                                                <input type="text" class="form-control form-control-danger" value="{{ $event->label }}" name="label" placeholder="put your label here" required />
                                            </div>

                                            <div class="form-group">
                                                <label for="">
                                                    Prix <span><i class="ik ik-dollar-sign"></i></span>
                                                </label>
                                                <input type="number" class="form-control form-control-danger" value="{{ $event->price }}" name="price" placeholder="price here" min="0" max="100" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Description</label>
                                                <textarea class="form-control form-control-danger" rows="3" name="description">{{ $event->description }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Le lieux </label>
                                                <input type="texte" class="form-control form-control-danger" value="{{ $event->lieux }}" name="lieux" placeholder="lieux" />
                                            </div>

                                            <div class="form-group">
                                                <label>Affiche de l'événement</label><br />
                                                <img src="{{ asset('../storage/' . $event->photo) }}" class="rounded img-40 align-top mr-15" />
                                                <br />
                                                <br />

                                                <div class="form-group">
                                                    <label>Image de l'evenement</label>
                                                    <input type="file" name="photo" class="form-control form-control-danger" />
                                                </div>
                                            </div>

                                            <input type="submit" class="form-control form-control-danger" value="Modifier" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <h4 class="text-muted text-center">Manage Organisateurs</h4>
                        <div class="text-right mt-3 mb-5">
                            <button type="button" class="btn btn-danger" data-mdb-dismiss="modal" data-mdb-toggle="modal" data-mdb-target="#addOrg"><i class="fa fa-add"></i> Ajouter</button>
                            <br />
                            <br />
                            <table class="table w-75 m-auto">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Organisateur</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($eventOgrs as $eventOgr)
                                <tbody>
                                    <tr>
                                        <td>{{ $eventOgr->id }}</td>
                                        <td>{{ $eventOgr->user->name }}</td>

                                        <form action="{{ url('admin/eventorgs/'.$eventOgr->id) }}" method="post">
                                            {{ csrf_field() }} {{ method_field('DELETE') }}

                                            <td>
                                                <button type="submit" class="btn btn-danger rounded-pill ">
                                                    Delete<span> <i class="ik ik-x-circle"></i></span>
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                      <h4 class="text-muted text-center">Manage Sous Evénements</h4>
                      <div class="text-right mt-3 mb-5">
                          <button type="button" class="btn btn-danger" data-mdb-dismiss="modal" data-mdb-toggle="modal" data-mdb-target="#addSubEvent"><i class="fa fa-add"></i> Ajouter</button>
                          <br />
                          <br />
                       
                      <table class="table w-75 h-50  m-auto">
                        <thead>
                            <tr>
                              <th scope="col">id</th>
                                      <th scope="col">details</th>
                                      <th scope="col">description</th>
                            
                                      <th scope="col">Created at</th>
                                      <th scope="col">Updated at</th>
                                      <th scope="col">action</th>
                            </tr>
                        </thead>
                        @foreach ($subevents as $subevent)
                                        
                        <tr>
                            <th scope="row"> {{$subevent->id}}</th>
                            <td> <div class="d-inline-block align-middle">
                                <img src="{{asset('../storage/'.$subevent->photo)}}" alt="" class="  img-40 align-top mr-15">
                                <div class="d-inline-block">
                                    <h6>{{$subevent->price}} dt</h6>
                                    <p class="text-muted mb-0">{{$subevent->label}}</p>
                                </div>
                            </div>
                            <td>{{$subevent->description}}</td>
            
                            </td>
                            
                            <td>{{$subevent->created_at}}</td>
                            <td>{{$subevent->updated_at}}</td>
                            <td>
                              
                                <form action="{{url('admin/subevents/'.$subevent->id)}}" method="post">
                                    

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                
                              <button type="submit" class="btn btn-danger">Supprimer <span><i class="ik ik-x-circle"></i></span></button></a>
                            </td>
                            
                                </form>
                            </td>
                          </tr>
                        @endforeach
                      </table>
                      </div>
                    </div>
                    <!-- Tabs content -->
                </div>
            </div>
        </div>
    </div>
</div>
 {{---------------------------------------------- modal manage ORG -----------------------------------------------}}
<div class="modal top fade" id="addOrg" tabindex="-1" aria-labelledby="addOrgLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOrgLabel">Add Organisateur</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action=" {{ url('admin/eventorgs') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input hidden value="{{ $event->id }}" name="event" required />
                    </div>
                    <div>
                        <label for="">Organisateur</label>
                        <select class="form-control form-control-danger" name="user" class="form-control @error('event') is-invalid @enderror" required>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}"> {{ $user->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <br />

                    <input type="submit" class="form-control form-control-danger" value="Ajouter" />
                </form>
            </div>
        </div>
    </div>
</div>

 {{---------------------------------------------- modal manage SUB EVENT -----------------------------------------------}}


 <div class="modal top fade" id="addSubEvent" tabindex="-1" aria-labelledby="addSubEventLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="addSubEventLabel">Add Sous Evénemment</h5>
              <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action=" {{url('admin/subevents')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="form-group">
                  <label for="">Nom de Sous l'événement </label>
                    <input type="text" class="form-control form-control-danger"  name="label"  placeholder="Nom" required>
                </div>
  
                <div>
                  {{-- <label for="">Nom de  l'événement </label>
                    <select class="form-control form-control-danger" name="event" class="form-control @error('event') is-invalid @enderror" required>
                            <option value="">Choisir l'evenement</option>
                            @foreach($events  as $event)
                                <option value="{{$event->id}}">{{$event->label}}</option>
                            @endforeach
                        </select>
               </div>
  <br> --}}


                    <div class="form-group">
                      <input hidden value="{{ $event->id }}" name="event" required />
                   </div>
  
  
                <div class="form-group">
                  <label for="">Le prix <span>DT</span> </label>
                    <input type="number" class="form-control form-control-danger"  name="price"  placeholder="Prix" min="0" max="100">
                </div>
  
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control form-control-danger" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                </div>
  
                
                <div class="form-group">
                  <label>Image de l'evenement</label>
                   <input type="file" name="photo" class="form-control form-control-danger" >
                </div>
               <input type="submit" class="form-control form-control-danger" value="Ajouter" >
            <form>
          </div>
      </div>
  </div>
</div>
@endsection
