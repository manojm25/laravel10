@extends('admin.admin_master')
@section('admin')

@php
$blogcategory = App\Models\BlogCategory::latest()->get();
@endphp


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Add Blog</h4>

        <form class="form-horizontal mt-3" method="POST" action="{{route('update.blog')}}" enctype="multipart/form-data">
            @csrf

           <input type="hidden" name="id" id="id" value="{{$blog->id}}">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Blog Category</label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="blog_category_id" id="blog_category_id"> 
                    @foreach($blogcategory as $item)
                    <option value="{{$item->id}}" {{ $blog->blog_category_id == $item->id ? 'selected' : '' }}>{{$item->blog_category}}</option>
                    @endforeach
                    </select>
                    @error('blog_category_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
           
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="blog_title" value="{{$blog->blog_title}}" name="blog_title">
                @error('blog_title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <!-- end row -->
        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Blog Tags</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="blog_tags" value="{{$blog->blog_tags}}" name="blog_tags" data-role="tagsinput">
                 @error('blog_tags')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Blog Short Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="blog_short_description">{{$blog->blog_short_description}}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Blog Description</label>
            <div class="col-sm-10">
                <textarea id="elm1" name="blog_description">{{$blog->blog_description}}</textarea>
            </div>
        </div>

        <!-- end row -->
        <div class="row mb-3">
            <label for="example-email-input" class="col-sm-2 col-form-label">Blog Image</label>
            <div class="col-sm-10">
                <input class="form-control" type="file"  id="blog_image" value="" name="blog_image">
                 @error('blog_image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
             <label for="example-email-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="showImage" class="rounded avatar-lg" src="{{(!empty($blog->blog_image))? url($blog->blog_image): url('backend/assets/images/no_image.jpg')}}" alt="Card image cap">
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
  $('#blog_image').change(function(e){
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