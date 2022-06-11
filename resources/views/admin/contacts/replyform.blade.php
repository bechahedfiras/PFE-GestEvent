@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="text-muted">Importer  des utilisateurs</h3>
                    </div> --}}
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
                        
                         <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 text-muted mx-2 my-3 ">Repondre Au Utilisateurs</h1>
        <a href="{{ url('/contactus') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages
    @include('common.alert') --}}
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">REPONDRE</h6>
             </div>
            <form method="POST" action="{{url('/sendmail')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        
                        <div class="col-md-12 mb-3 mt-3">
                            <p><span class="text-primary">*</span> repondre au utilisateur <a href="" target="_blank"></a></p>
                        </div>
                        <form>
                            <!-- name input -->
                            <div class="form-outline mb-4">
                              <input type="text" id="form1Example1" name="title" class="form-control" />
                              <label class="form-label" for="form1Example1" aria-required="true">Title</label>
                            </div>
                          
                             {{-- <!-- Email sender input -->
                             <div class="form-outline mb-4">
                                <input  type="hidden"  name="sender" class="form-control" />
                                <label class="form-label"  value="{{$theSenderemail}}" ></label>
                              </div> --}}
 
                              <div class="col-md-12">
                                <input id="email" type="hidden" 
                                     name="sender" value="{{$theSenderemail}}" required
                                    autocomplete="email" autofocus>
                            </div>
                              <!-- Email input -->
                             <div class="form-outline mb-4">
                                <input type="email" id="form1Example1" name="mail" class="form-control" />
                                <label class="form-label" for="form1Example1" value="{{ Auth::user()->email }}" aria-required="true">Email</label>
                              </div>

                              <!-- Number input -->
                                    <div class="form-outline mb-4">
                                        <input type="number" id="form6Example6" name="tel" class="form-control" />
                                        <label class="form-label" for="form6Example6" aria-required="true">Phone</label>
                                    </div>
                          
                                      <!-- Message input -->
                                <div class="form-outline mb-4">
                                    <textarea class="form-control" name="mess" id="form6Example7" rows="4"></textarea>
                                    <label class="form-label" for="form6Example7" aria-required="true">Additional information Message</label>
                                </div>
                           
                          
                        
                          
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">SEND</button>
                          </form>

                    </div>
                </div>

                <div class="card-footer">
         
                    <a class="btn btn-danger float-right mr-3 mb-3" href="{{ url('/contactus') }}">Cancel</a>
                </div>
                </div>
            </form>


                    

                        
                        
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@stop
