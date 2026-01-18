@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Add Multi Image</h4>

        <form class="form-horizontal mt-3" method="POST" action="{{route('store.multi.image')}}" enctype="multipart/form-data"> <br><br>
            @csrf
            <input type="hidden" name="id" value="">
        <!-- end row -->
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">About Multi Image</label>
            <div class="col-sm-10">
                <input class="form-control" type="file"  id="multi_image" value="" name="multi_image[]" multiple="">
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

<script type="text/javascript">

$(document).ready(function(){
  $('#multi_image').change(function(e){
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