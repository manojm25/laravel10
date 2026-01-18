@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Edit Portfolio | Update Page</h4>

        <form class="form-horizontal mt-3" method="POST" action="{{route('update.portfolio')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$portfolio->id}}">
           
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="portfolio_name" value="{{$portfolio->portfolio_name}}" name="portfolio_name">
                @error('portfolio_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <!-- end row -->
        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Portfolio Title</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="portfolio_title" value="{{$portfolio->portfolio_title}}" name="portfolio_title">
                 @error('portfolio_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Portfolio Description</label>
            <div class="col-sm-10">
                <textarea id="elm1" name="portfolio_description">{{$portfolio->portfolio_description}}</textarea>
                
            </div>
        </div>


        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Portfolio Location</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="location" value="{{$portfolio->location}}" name="location">
                 @error('location')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Portfolio Category</label>
            <div class="col-sm-10">
                <input class="form-control " type="text" placeholder="" id="category" value="{{$portfolio->category}}" name="category" data-role="tagsinput">
                 @error('category')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Portfolio Client Ethnicity</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="client_ethnicity" value="{{$portfolio->client_ethnicity}}" name="client_ethnicity">
                 @error('client_ethnicity')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>


        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Portfolio Link</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="portfolio_link" value="{{$portfolio->portfolio_link}}" name="portfolio_link">
                 @error('portfolio_link')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <!-- end row -->
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Portfolio Image</label>
            <div class="col-sm-10">
                <input class="form-control" type="file"  id="portfolio_image" value="{{$portfolio->portfolio_image}}" name="portfolio_image">
                 @error('portfolio_image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
             <label for="example-email-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImage" class="rounded avatar-lg" src="{{(!empty($portfolio->portfolio_image))? url($portfolio->portfolio_image): url('backend/assets/images/no_image.jpg')}}" alt="Card image cap">
            </div>
        </div>

        <!-- Support Image - 1 -->
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Portfolio Support Image One</label>
            <div class="col-sm-10">
                <input class="form-control" type="file"  id="portfolio_support_image_one" value="{{$portfolio->portfolio_support_image_one}}" name="portfolio_support_image_one">
                 @error('portfolio_support_image_one')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
             <label for="example-email-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImage1" class="rounded avatar-lg" src="{{(!empty($portfolio->portfolio_support_image_one))? url($portfolio->portfolio_support_image_one): url('backend/assets/images/no_image.jpg')}}" alt="Card image cap">
            </div>
        </div>

        <!-- Support Image - 2 -->
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Portfolio Support Image Two</label>
            <div class="col-sm-10">
                <input class="form-control" type="file"  id="portfolio_support_image_two" value="{{$portfolio->portfolio_support_image_two}}" name="portfolio_support_image_two">
                 @error('portfolio_support_image_two')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
             <label for="example-email-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImage2" class="rounded avatar-lg" src="{{(!empty($portfolio->portfolio_support_image_two))? url($portfolio->portfolio_support_image_two): url('backend/assets/images/no_image.jpg')}}" alt="Card image cap">
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
  function previewImage(input, target) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => $(target).attr('src', e.target.result);
        reader.readAsDataURL(input.files[0]);
    }
   }

$('#portfolio_image').on('change', function () {
    previewImage(this, '#showImage');
});

$('#portfolio_support_image_one').on('change', function () {
    previewImage(this, '#showImage1');
});

$('#portfolio_support_image_two').on('change', function () {
    previewImage(this, '#showImage2');
});
});
</script>

@endsection