@extends('client.client_dashboard')
@section('client')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">All Coupon</h4>

                    
                    <div class="page-title-right">
                        <a href="{{route('add.coupon')}}"  class="btn btn-info waves-effect waves-light">Add Coupon</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                        
                    </div>
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Coupon Name</th>
                                <th>Coupon Desc</th>
                                <th>Discount</th>
                                <th>Validity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($coupon as $key=>$item)
                                
                           
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->coupon_name}}</td>
                                    <td>{{$item->coupon_desc}}</td>
                                    <td>{{$item->discount}}</td>
                                    <td>{{$item->validity}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <a href="{{route('edit.menu',$item->id)}}" class="btn btn-info waves-effect waves-light">Edit</a>
                                        <a href="{{route('delete.menu',$item->id)}}" class="btn btn-danger waves-effect waves-light" id="delete">Delete</a>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            
                          
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row --> 

         <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection