@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
      
    <center>
        
    </center>
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Edit Profile Page</h4>

        <form class="form-horizontal mt-3" method="POST" action="{{route('store.profile')}}" enctype="multipart/form-data">
            @csrf
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="example-text-input" value="{{$editData->name}}" name="name">
            </div>
        </div>
        <!-- end row -->
        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="search" placeholder="" id="username" value="{{$editData->username}}" name="username">
            </div>
        </div>
        <!-- end row -->
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">User Email</label>
            <div class="col-sm-10">
                <input class="form-control" type="email" placeholder="bootstrap@example.com" id="example-email-input" value="{{$editData->email}}" name="email">
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Profile Image</label>
            <div class="col-sm-10">
                <input class="form-control" type="file"  id="image" value="" name="profileimage">
            </div>
        </div>

         <div class="row mb-3">
             <label for="example-email-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImage" class="rounded avatar-lg" src="{{(!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image): url('backend/assets/images/placeholder.jpg')}}" alt="Card image cap">
            </div>
        </div>

        <div class="form-group mb-3 text-center row mt-3 pt-1">
    <div class="col-4">
        <button class="btn btn-info btn-rounded w-100 waves-effect waves-light" type="submit">Update Profile</button>
    </div>
</div>

        </form>
                                        <!-- end row -->
                                      
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
    
</div>
</div>    

<script type="text/javascript">

$(document).ready(function(){
  $('#image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e)
    {
        $('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  });
});
</script>

@endsection