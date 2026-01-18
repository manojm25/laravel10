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

                                        <h4 class="card-title">Home Slider | Update Page</h4>

        <form class="form-horizontal mt-3" method="POST" action="{{route('update.slider')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$homeslide->id}}">
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="title" value="{{$homeslide->title}}" name="title">
            </div>
        </div>
        <!-- end row -->
        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Short Title</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="short_title" value="{{$homeslide->short_title}}" name="short_title">
            </div>
        </div>
        <!-- end row -->
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Slider  Image</label>
            <div class="col-sm-10">
                <input class="form-control" type="file"  id="home_slide" value="" name="home_slide">
            </div>
        </div>

        <div class="row mb-3">
             <label for="example-email-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImage" class="rounded avatar-lg" src="{{(!empty($homeslide->home_slide))? url($homeslide->home_slide): url('backend/assets/images/no_image.jpg')}}" alt="Card image cap">
            </div>
        </div>

         <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Video URL</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="video_url" value="{{$homeslide->video_url}}" name="video_url">
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
  $('#home_slide').change(function(e){
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