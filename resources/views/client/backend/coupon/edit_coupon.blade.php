@extends('client.client_dashboard')
@section('client')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Edit Coupon</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Coupon </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12 col-lg-12"> 
                <div class="card">
                <div class="card-body p-4">

                <form  action="{{ route('coupon.update') }}" method="post" enctype="multipart/form-data">
                    @csrf

                <div class="row">
                    <div class="col-lg-4">
                        <input type="hidden" name="id" value="{{ $coupon->id }}" >
                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-label">Coupon Name</label>
                                <input class="form-control" type="text" value="{{$coupon->coupon_name}}" name="coupon_name"  id="example-text-input">
                            </div>
                    </div>
                    <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-label">Coupon Description</label>
                                <input class="form-control" type="text" value="{{$coupon->coupon_desc}}" name="coupon_desc"  id="example-text-input">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-label">Discount</label>
                                <input class="form-control" type="text" value="{{$coupon->discount}}" name="discount"  id="example-text-input">
                            </div>
                        </div>

                    
                   
                    <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label for="example-text-input" class="form-label">Validity</label>
                                <input class="form-control" type="date" value="{{$coupon->validity}}" name="validity"  id="example-text-input" min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                            </div>
                    </div>
                  
                            
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                            </div>

                       
                  
                </div>
                </form>
                </div>
                </div>










                <!-- end tab content -->
            </div>
            <!-- end col -->


            <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection
