@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Edit Blog Category | Update Page</h4>

        <form class="form-horizontal mt-3" method="POST" action="{{route('update.blog.category')}}">
            @csrf
            <input type="hidden" name="id" value="{{$blogcategory->id}}">
           
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="blog_category" value="{{$blogcategory->blog_category}}" name="blog_category">
                @error('blog_category')
                <span class="text-danger">{{$message}}</span>
                @enderror
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

@endsection