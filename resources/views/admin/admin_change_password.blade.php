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

                                        <h4 class="card-title">Change Password Page</h4>

         @if(count($errors))
           @foreach ($errors->all() as $error)
            <p class="alert alert-danger alert-dismissible fade show">{{$error}}</p>
           @endforeach
         
         @endif
        <form class="form-horizontal mt-3" method="POST" action="{{route('update.password')}}" >
            @csrf
        <div class="row mb-3 mt-4">
            <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" placeholder="" id="oldpassword" value="" name="oldpassword">
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" placeholder="" id="newpassword" value="" name="newpassword">
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" placeholder="" id="confirmpassword" value="" name="confirmpassword">
            </div>
        </div>
        <!-- end row -->
        <!-- <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" placeholder="" id="password_confirmation" value="" name="password_confirmation">
            </div>
        </div> -->
        <!-- end row -->
        <div class="form-group mb-3 text-center row mt-3 pt-1">
    <div class="col-4">
        <button class="btn btn-info btn-rounded w-100 waves-effect waves-light" type="submit">Change Password</button>
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

@endsection