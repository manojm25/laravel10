@extends('admin.admin_master')
@section('admin')
 <div class="page-content">
    <div class="container-fluid">
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">All Work History Data</h4>
                                 

<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th>Sl</th>
        <th>Job Title</th>
        <th>Company Name</th>
        <th>Service Period</th>
        <th>Company Logo</th>
        <th>Action</th>
    </tr>
    </thead>


    <tbody>
         @php($i=1)
        @foreach($workhistory as $item)
    <tr>
        <td>{{$i++}}</td>
         <td>{{$item->job_title}}</td>
         <td>{{$item->company_name}}</td>
         <td>{{$item->service_period}}</td>
         <td><img src="{{asset($item->company_logo)}}" style="width:60px;height:50px;" alt=""></td>
        <td>
            <a href="{{route('edit.work.history',$item->id)}}" class="btn btn-info sm" title="Edit Data"><i class="far fa-edit"></i></a>
            <a href="{{route('delete.work.history',$item->id)}}" class="btn btn-danger sm deletesweet" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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