@extends('layouts.admin')

@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-muted">Listes des évènements</h3>
                </div>
                @if (session('alert_scc'))
                <br>
                <div class="alert alert-success m-auto w-25 text-center">
                    {{ session('alert_scc') }}
                </div>
                @endif @if (session('alert_err'))
                <br>
                    <div class="alert alert-danger m-auto w-25 text-center">
                        {{ session('alert_err') }}
                    </div>
                @endif
                
                <div class="text-right">
                        
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success m-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                        Ajouter
                     </button>
                     
                   
                </div>
                   
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">details</th>
                        <th scope="col">description</th>
                        <th scope="col">lieux</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">action</th>
                      </tr>
                    </thead>
                   
                  
                    <tbody>
                        <tbody>
                            @foreach ($events as $event)
                           
                            <tr>
                                <th scope="row"> {{$event->id}}</th>
                                <td> <div class="d-inline-block align-middle">
                                     <img src="{{asset('../storage/'.$event->photo)}}" alt="" class="  img-40 align-top mr-15"> 
                                    <div class="d-inline-block">
                                        <h6>{{$event->price}} dt</h6>
                                        <p class="text-muted mb-0">{{$event->label}}</p>
                                    </div>
                                </div>
                                <td>{{$event->description}}</td>
                                <td>{{$event->lieux}}</td>

                                </td>
                                
                                <td>{{$event->created_at}}</td>
                                <td>{{$event->updated_at}}</td>
                                <td>
                                   
                              

                                        {{-- <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                           preview
                                        </button> --}}
                                        <form action="" method="post">
                                         
                                                <button type="button" data-route="{{url('admin/eventsajax/'.$event->id.'/edit')}}" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-primary edit"> Modifier <span><i class="ik ik-edit-1"></i></span></button>
    
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
    
                                        
                                       <button type="submit" class="btn btn-danger">Supprimer <span><i class="ik ik-x-circle"></i></span></button></a>
                                    </td>
                                    
                                        </form>

                                </td>
                                
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                      
                    </tbody>
                  </table>

   <!-- Modal -->
   <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog  ">
        
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EVENT LABEL</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <!-- Tabs navs -->
            <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                <li class="nav-item success" role="presentation">
                <a
                    class="nav-link active text-success  bg-dark"
                    id="ex1-tab-1"
                    data-mdb-toggle="tab"
                    href="#ex1-tabs-1"
                    role="tab"
                    aria-controls="ex1-tabs-1"
                    aria-selected="true"
                    >Ajouter</a
                >
                </li>
                <li class="nav-item" role="presentation">
                <a
                    class="nav-link"
                    id="ex1-tab-2"
                    data-mdb-toggle="tab"
                    href="#ex1-tabs-2"
                    role="tab"
                    aria-controls="ex1-tabs-2"
                    aria-selected="false"
                    >Tab 2</a
                >
                </li>
                <li class="nav-item" role="presentation">
                <a
                    class="nav-link"
                    id="ex1-tab-3"
                    data-mdb-toggle="tab"
                    href="#ex1-tabs-3"
                    role="tab"
                    aria-controls="ex1-tabs-3"
                    aria-selected="false"
                    >Tab 3</a
                >
                </li>
            </ul>
            <!-- Tabs navs -->
            
            <!-- Tabs content -->
            <div class="tab-content" id="ex1-content">
                <div
                class="tab-pane fade show active"
                id="ex1-tabs-1"
                role="tabpanel"
                aria-labelledby="ex1-tab-1"
                >
                <div class="container">
                    <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-header"><h3>Ajouter un événement</h3></div>
                        <div class="card-body">
                            <form id="eventForm" method="post" enctype="multipart/form-data">
                                        {{-- token genrated --}}
                                     {{ csrf_field() }}  
       
                                     <input type="hidden" name="token" value="ssdfdsfsdfsdfs32r23442">
                                    {{-- token genrated --}}          
                                <div class="form-group">
                                  <label for="">Nom de l'événement </label>
                                    <input type="text" class="form-control form-control-primary"  name="label"  placeholder="Nom" required>
                                </div>
                  
                               
                  
                                <div>
                                  <label for="">Organisateur</label>
                                    <select class="form-control form-control-primary" name="event" class="form-control @error('event') is-invalid @enderror" required>
                                      @foreach($eventOgrs as $eventOgr)
                                      <option value="{{ $eventOgr->id }} ">    {{ $eventOgr->name }} </option>
                                           
                                   
                                    @endforeach
                                        </select>
                               </div>
                             <br>
                  
                  
                             
                  
                                <div class="form-group">
                                  <label for="">Le prix <span>DT</span> </label>
                                    <input type="number" class="form-control form-control-primary"  name="price"  placeholder="Prix" min="0" max="100">
                                </div>
                  
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Description</label>
                                  <textarea class="form-control form-control-primary" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                                </div>
                  
                                <div class="form-group">
                                  <label for="">Le lieux  </label>
                                    <input type="texte" class="form-control form-control-primary"  name="lieux"  placeholder="lieux" >
                                </div>
                                <div class="form-group">
                                  <label>Affiche</label>
                                   <input type="file" name="photo" class="form-control form-control-primary" >
                                </div>
                               <button id='save_event' class="form-control form-control-primary" value="Ajouter">Ajouter</button>
                            </form>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                  
                </div>
                <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
               
                </div>
            </div>
         <!-- Tabs content -->
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
            Close
        </button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>  


                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

                @section('scripts')
                <script>
                    $.ajaxSetup({
                         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                                 } 
                        });

///create event with ajax
               $(document).on('click','#save_event',function(e){

                    e.preventDefault();

                    var formData  = new FormData(jQuery('#eventForm')[0]);
                            $.ajax({
                            type: 'POST',
                            enctype: 'multipart/form-data',
                            url: "{{ url('admin/eventsajax') }}",
                            data:formData,
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function (data) {
                             
                                if (data.status == true) {
                              $('#alert_scc').show();
                                
                            }, error: function (reject) {
                            

                        
                            }
                        });

               });

               ///update event with ajax
               $(".edit").on("click",function(){

          console.log($(this).attr("data-route"));
           
        })

    

                </script>
                @stop