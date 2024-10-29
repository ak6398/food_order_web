@extends('client.client_dashboard')
@section('client')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Edit Product</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-12 col-lg-6">
                <div class="card">
                    <div class="card-body p-4">
                        <form id="myForm" action="{{route('product.update')}}" method="POST" enctype="multipart/form-data">@csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <div class="row">
                                <div class=" form-group col-lg-4">
                                    <div>
                                        <div class=" mb-3">
                                            <label for="example-text-input" class="form-label">Category Name</label>
                                            <select class="form-select" name="category_id">
                                                <option>Select</option>
                                                @foreach ($category as $cat)
                                                <option value="{{$cat->id}}" {{$cat->id ==$product->category_id ?'selected':''}}>{{$cat->category_name}}</option>  
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class=" form-group col-lg-4">
                                    <div>
                                        <div class=" mb-3">
                                            <label for="example-text-input" class="form-label">Menu Name</label>
                                            <select class="form-select" name="menu_id" >
                                                <option>Select</option>
                                                @foreach ($menu as $men)
                                                <option value="{{$men->id}}" {{$men->id==$product->menu_id ? 'selected':''}}>{{$men->menu_name}}</option>  
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class=" form-group col-lg-4">
                                    <div>
                                        <div class=" mb-3">
                                            <label for="example-text-input" class="form-label">City Name</label>
                                            <select class="form-select" name="city_id">
                                                <option>Select</option>
                                                @foreach ($city as $cit)
                                                <option value="{{$cit->id}}" {{$cit->id==$product->city_id ? 'selected':''}}>{{$cit->city_name}}</option>  
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class=" form-group col-lg-4">
                                    <div>
                                        <div class=" mb-3">
                                            <label for="example-text-input" class="form-label">Product Name</label>
                                            <input class="form-control" name="name" type="text" value="{{$product->name}}" id="example-text-input">
                                        </div>
                                    </div>
                                </div>


                                <div class=" form-group col-lg-4">
                                    <div>
                                        <div class=" mb-3">
                                            <label for="example-text-input" class="form-label">Product Price</label>
                                            <input class="form-control" name="price" type="text" value="{{$product->price}}" id="example-text-input">
                                        </div>
                                    </div>
                                </div>


                                <div class=" form-group col-lg-4">
                                    <div>
                                        <div class=" mb-3">
                                            <label for="example-text-input" class="form-label">Discount Price</label>
                                            <input class="form-control" name="discount_price"  value="{{$product->discount_price}}" type="text" id="example-text-input">
                                        </div>
                                    </div>
                                </div>


                                <div class=" form-group col-lg-6">
                                    <div>
                                        <div class=" mb-3">
                                            <label for="example-text-input" class="form-label">Size</label>
                                            <input class="form-control" name="size" value="{{$product->size}}" type="text" id="example-text-input">
                                        </div>
                                    </div>
                                </div>


                                <div class=" form-group col-lg-6">
                                    <div>
                                        <div class=" mb-3">
                                            <label for="example-text-input" class="form-label">Product Qty</label>
                                            <input class="form-control" name="qty" type="text" value="{{$product->qty}}" id="example-text-input">
                                        </div>
                                    </div>
                                </div>


                                <div class=" form-group col-lg-6">
                                    <div>
                                        <div class=" mb-3">
                                            <label for="example-text-input" class="form-label">Product image</label>
                                            <input class="form-control" name="image" type="file"  id="image_id">
                                        </div>
                                    </div>
                                </div>

                                <div class=" form-group col-lg-6">
                                    <div>
                                        <div class=" mb-3">
                                            <img id="show_image" src="{{asset($product->image)}}" alt="" class="rounded-circle p-1 bg-primary" width="120">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="best_seller" {{$product->best_seller==1 ?'checked':''}}  id="formCheck1">
                                            <label class="form-check-label" for="formCheck1"  >
                                                Best Seller
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="most_popular" value="1"{{$product->most_popular==1 ?'checked':''}} id="formCheck2">
                                            <label class="form-check-label" for="formCheck2" >
                                                Most Popular
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                </div>
                                

                            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end col -->


            <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#image_id').change(function(e){
            var reader=new FileReader();
            reader.onload=function(e){
                $('#show_image').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
    </script>


<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                menu_id: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter  name',
                }, 
                menu_id: {
                    required : 'Please select menu',
                }, 
            
                
                 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
@endsection