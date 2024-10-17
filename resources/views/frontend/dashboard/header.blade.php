
@php
    $id=Auth::user()->id;
    $profileData=App\Models\User::find($id);
@endphp

<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>user Dashboard - Online Food Ordering</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="{{asset('frontend/img/favicon.png')}}">
      <!-- Bootstrap core CSS-->
      <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Font Awesome-->
      <link href="{{asset('frontend/vendor/fontawesome/css/all.min.css')}}" rel="stylesheet">
      <!-- Font Awesome-->
      <link href="{{asset('frontend/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
      <!-- Select2 CSS-->
      <link href="{{asset('frontend/vendor/select2/css/select2.min.css')}}" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="{{asset('frontend/css/osahan.css')}}" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
     
 

      
      
   </head>
   <body>
      <!-- Modal -->
      <div class="modal fade" id="edit-profile-modal" tabindex="-1" role="dialog" aria-labelledby="edit-profile" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="edit-profile">Edit profile</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  {{-- <form>
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label>Phone number
                           </label>
                           <input type="text" value="+91 85680-79956" class="form-control" placeholder="Enter Phone number">
                        </div>
                        <div class="form-group col-md-12">
                           <label>Email id
                           </label>
                           <input type="text" value="iamosahan@gmail.com" class="form-control" placeholder="Enter Email id
                              ">
                        </div>
                        <div class="form-group col-md-12 mb-0">
                           <label>Password
                           </label>
                           <input type="password" value="**********" class="form-control" placeholder="Enter password
                              ">
                        </div>
                     </div>
                  </form> --}}

                  <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Name</label>
                                    <input class="form-control" name="name" type="text" value="{{$profileData->name}}" id="example-text-input">
                                </div>
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Email</label>
                                    <input class="form-control" name="email" type="email" value="{{$profileData->email}}" id="example-text-input">
                                </div>
                        
                                
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <label for="example-date-input" class="form-label">Mobile</label>
                                    <input class="form-control" name="phone" type="text" value="{{$profileData->phone}}" id="example-date-input">
                                </div>

                              
                            </div>
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <label for="example-date-input" class="form-label">Address</label>
                                    <input class="form-control" name="address" type="text" value="{{$profileData->address}}" id="example-date-input">
                                </div>
                                
                              
                            </div>
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <label for="example-date-input" class="form-label">Image</label>
                                    <input class="form-control" name="photo" type="file"  id="image">
                                </div>

                                <div class="mb-3">
                                    
                                    <img id="show_image" src="{{!empty($profileData->photo)?url('upload/admin_images/'.$profileData->photo):url('upload/no_image.jpg')}}" alt="" class="rounded-circle p-1 bg-primary" width="120">
                                </div>
                                
                              
                            </div>
                        </div>
                    </div>
                    
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn d-flex w-50 text-center justify-content-center btn-outline-primary" data-dismiss="modal">CANCEL
                  </button><button type="submit" class="btn d-flex w-50 text-center justify-content-center btn-primary">UPDATE</button>
               </div>
    </form>

            </div>
         </div>
      </div>
     
      <nav class="navbar navbar-expand-lg navbar-light bg-light osahan-nav shadow-sm">
         <div class="container">
            <a class="navbar-brand" href="index.html"><img alt="logo" src="{{asset('frontend/img/logo.png')}}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="offers.html"><i class="icofont-sale-discount"></i> Offers <span class="badge badge-danger">New</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#" role="button" >
                     Restaurants
                     </a>
                     
                  </li>
                 
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img alt="Generic placeholder image" src="{{!empty($profileData->photo)?url('upload/admin_images/'.$profileData->photo):url('upload/no_image.jpg')}}" class="nav-osahan-pic rounded-pill"> My Account
                     </a>
                     <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                        <a class="dropdown-item" href="{{route('dashboard')}}"><i class="icofont-food-cart"></i> Dashboard</a>
                        <a class="dropdown-item" href="{{route('user.logout')}}"><i class="icofont-sale-discount"></i> Logout</a>

                     </div>
                  </li>
                  <li class="nav-item dropdown dropdown-cart">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-shopping-basket"></i> Cart
                     <span class="badge badge-success">5</span>
                     </a>
                     <div class="dropdown-menu dropdown-cart-top p-0 dropdown-menu-right shadow-sm border-0">
                        <div class="dropdown-cart-top-header p-4">
                           <img class="img-fluid mr-3" alt="osahan" src="img/cart.jpg">
                           <h6 class="mb-0">Gus's World Famous Chicken</h6>
                           <p class="text-secondary mb-0">310 S Front St, Memphis, USA</p>
                           <small><a class="text-primary font-weight-bold" href="#">View Full Menu</a></small>
                        </div>
                        <div class="dropdown-cart-top-body border-top p-4">
                           <p class="mb-2"><i class="icofont-ui-press text-danger food-item"></i> Chicken Tikka Sub 12" (30 cm) x 1   <span class="float-right text-secondary">$314</span></p>
                           <p class="mb-2"><i class="icofont-ui-press text-success food-item"></i> Corn & Peas Salad x 1   <span class="float-right text-secondary">$209</span></p>
                           <p class="mb-2"><i class="icofont-ui-press text-success food-item"></i> Veg Seekh Sub 6" (15 cm) x 1  <span class="float-right text-secondary">$133</span></p>
                           <p class="mb-2"><i class="icofont-ui-press text-danger food-item"></i> Chicken Tikka Sub 12" (30 cm) x 1   <span class="float-right text-secondary">$314</span></p>
                           <p class="mb-2"><i class="icofont-ui-press text-danger food-item"></i> Corn & Peas Salad x 1   <span class="float-right text-secondary">$209</span></p>
                        </div>
                        <div class="dropdown-cart-top-footer border-top p-4">
                           <p class="mb-0 font-weight-bold text-secondary">Sub Total <span class="float-right text-dark">$499</span></p>
                           <small class="text-info">Extra charges may apply</small>  
                        </div>
                        <div class="dropdown-cart-top-footer border-top p-2">
                           <a class="btn btn-success btn-block btn-lg" href="checkout.html"> Checkout</a>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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