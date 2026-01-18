@extends('admin.admin_master')
@section('admin')
 <div class="page-content">
    <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Footer Data</h4>
                                 

<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>Sl</th>
        <th>Number</th>
        <!-- <th>Short Description</th> -->
        <th>Address</th>
        <th>Email</th>
        <th>Facebook</th>
        <th>Twitter</th>
        <th>Instagram</th>
        <th>Copy Right</th>
        <th>Action</th>
    </tr>
    </thead>


    <tbody>
         @php($i=1)
        @foreach($footer as $item)
    <tr>
        <td>{{$i++}}</td>
         <td>{{$item->number}}</td>
         <!-- <td>{{$item->short_description}}</td> -->
         <td>{{$item->address}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->facebook}}</td>
        <td>{{$item->twitter}}</td>
        <td>{{$item->instagram}}</td>
        <td>{{$item->copyright}}</td>
        <td>
            <a href="{{route('edit.footer',$item->id)}}" class="btn btn-info sm" title="Edit Data"><i class="far fa-edit"></i></a>
        </td>
    </tr>
    @endforeach
    
    </tbody>
</table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
 </div>

 
@endsection