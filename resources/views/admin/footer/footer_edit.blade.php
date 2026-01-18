@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Edit Footer | Update Page</h4>

        <form class="form-horizontal mt-3" method="POST" action="{{route('update.footer')}}">
            @csrf
            <input type="hidden" name="id" value="{{$footer->id}}">
           
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="number" value="{{$footer->number}}" name="number">
                @error('number')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <!-- end row -->
        <div class="row mb-3">
            <label for="example-search-input" class="col-sm-2 col-form-label">Short Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="short_description">{{$footer->short_description}}</textarea>
                @error('short_description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="address" value="{{$footer->address}}" name="address">
                @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="email" value="{{$footer->email}}" name="email">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="facebook" value="{{$footer->facebook}}" name="facebook">
                @error('facebook')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="twitter" value="{{$footer->twitter}}" name="twitter">
                @error('twitter')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Instagram</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="instagram" value="{{$footer->instagram}}" name="instagram">
                @error('instagram')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="" id="copyright" value="{{$footer->copyright}}" name="copyright">
                @error('copyright')
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