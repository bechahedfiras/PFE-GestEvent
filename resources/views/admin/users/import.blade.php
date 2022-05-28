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
        <h1 class="h3 text-muted mx-2 my-3 ">Import Users</h1>
        <a href="{{ url('admin/users') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages
    @include('common.alert') --}}
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Import Users</h6>
             </div>
            <form method="POST" action="{{route('upload')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        
                        <div class="col-md-12 mb-3 mt-3">
                            <p><span class="text-primary">*</span> Upload CSV in Given Format <a href="" target="_blank">Sample CSV Format</a></p>
                        </div>
                        {{-- File Input --}}
                        <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>File Input(Datasheet)</label>
                            <input 
                                type="file" 
                                class="form-control form-control-user @error('file') is-invalid @enderror" 
                                id="exampleFile"
                                name="file" 
                                value="{{ old('file') }}">

                            @error('file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-user float-right mb-3">Upload Users</button>
                    <a class="btn btn-primary float-right mr-3 mb-3" href="{{ url('admin/users') }}">Cancel</a>
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
