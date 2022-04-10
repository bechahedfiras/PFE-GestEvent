@extends('layouts.app')

@section('content')
<style>
 .container-profilepic {
            width: 150px;
            height: 150px;
        }
        .photo-preview {
            background-size: cover;
            background-position: center;
        }
        .middle-profilepic {
            background-color: rgba( 255,255,255, 0.69 );
        }
        .container-profilepic:hover .middle-profilepic {
            display: flex!important;
            cursor: pointer;
        }
</style>
<div class="top-spacer">

</div>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <form action="{{ route('users.update-profile')}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="container-profilepic card rounded-circle overflow-hidden">
                    <div class="photo-preview card-img w-100 h-100" style="background-image: url({{ asset('../storage/'.Auth::user()->profile_pic) }});"></div>
                    <div class="middle-profilepic text-center card-img-overlay d-none flex-column justify-content-center">
                        <div class="text-profilepic text-success ">
                            <i class="fas fa-camera"></i>
                            <div class="text-profilepic"><label for="files" class="btn"> Select Image</label>
                                <input id="files" style="visibility:hidden;" name="profile_pic" type="file"></div>
                        </div>
                    </div>
                </div>
                
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="number" class="form-control" value="{{ Auth::user()->phone_number }}" name="phone_number"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control"  value="{{ Auth::user()->address }}" name="address"></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="number" class="form-control" value="{{ Auth::user()->postcode }}" name="postcode"></div>
                    <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control"  value="{{ Auth::user()->state }}" name="state"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    $("#files").change(function() {
  filename = this.files[0].name;
  console.log(filename);
});
</script>
@endsection