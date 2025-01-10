<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Menu;
use App\Models\Product;
use App\Models\City;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Banner;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ManageController extends Controller
{
    public function AdminAllProduct()
    {
        $product=Product::orderBy('id','desc')->get();
        return view('admin.backend.product.all_product',compact('product'));
    }
    // ends hrere

    // //////////////////////////////////////// Banner function///////////////////////
    
    public function AllBanner()
    {
        $banner=Banner::latest()->get();
        return view('admin.backend.banner.all_banner',compact('banner'));
    }
    // end function

    public function BannerStore(Request $request)
    {
        if ($request->file('image')) {
            $image=$request->file('image');
            $manager= new ImageManager(new Driver());
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img=$manager->read($image);
            $img->resize(400,400)->save(public_path('upload/banner/'.$name_gen));
            // save to database
            $save_url='upload/banner/'.$name_gen;

            Banner::create([
                'url'=>$request->url,
                'image'=>$save_url,
            ]);
        }
        $notification=array(
            'message'=>'Banner added successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    // end function
}
