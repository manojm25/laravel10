@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Add Education Details</h4> <br><br>

        <form class="form-horizontal mt-3" method="POST" action="{{route('store.education.details')}}" enctype="multipart/form-data">
            @csrf
           
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Course Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="job_title" value="" name="job_title">
                @error('job_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Institution Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="company_name" value="" name="company_name">
                @error('company_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Period</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="service_period" value="" name="service_period">
                @error('service_period')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea id="elm1" name="description"></textarea>
            </div>
        </div>


         <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Institution Logo</label>
            <div class="col-sm-10">
                <input class="form-control" type="file"  id="company_logo" value="" name="company_logo">
                 @error('company_logo')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
             <label for="example-email-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImage" class="rounded avatar-lg" src="{{url('backend/assets/images/no_image.jpg')}}" alt="Card image cap">
            </div>
        </div>

        <div class="form-group mb-3 text-center row mt-3 pt-1">
    <div class="col-2">
        <button class="btn btn-info btn-rounded w-100 waves-effect waves-light" type="submit">Submit</button>
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

<script>
    $(document).ready(function(){
        function previewImage(input, target) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => $(target).attr('src', e.target.result);
        reader.readAsDataURL(input.files[0]);
    }
   }

   $('#company_logo').on('change', function () {
    previewImage(this, '#showImage');
});
});
</script>

@endsection