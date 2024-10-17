<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function AllCategory(){
        $category=Category::latest()->get();
        return view('admin.backend.category.all_category',compact('category'));
    }
    // end method

    public function AddCategory()
    {
        return view('admin.backend.category.add_category');
    }
    // end here

    public function StoreCategory(Request $request)
    {
        if ($request->file('image')) {
            $image=$request->file('image');
            $manager= new ImageManager(new Driver());
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img=$manager->read($image);
            $img->resize(300,300)->save(public_path('upload/category/'.$name_gen));
            // save to database
            $save_url='upload/category/'.$name_gen;

            Category::create([
                'category_name'=>$request->category_name,
                'image'=>$save_url,
            ]);
        }
        $notification=array(
            'message'=>'Category added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.category')->with($notification);
    }
    // end herer

    public function EditCategory($id)
    {
        $category=Category::find($id);
        return view('admin.backend.category.edit_category',compact('category'));
    }
    // end hrer

    public function UpdateCategory(Request $request)
    {
        $category_id=$request->id;
        if ($request->file('image')) {
            $image=$request->file('image');
            $manager= new ImageManager(new Driver());
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img=$manager->read($image);
            $img->resize(300,300)->save(public_path('upload/category/'.$name_gen));
            // save to database
            $save_url='upload/category/'.$name_gen;

            Category::find($category_id)->update([
                'category_name'=>$request->category_name,
                'image'=>$save_url,
            ]);
            $notification=array(
                'message'=>'Category updated successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('all.category')->with($notification);
        }
        else{
            Category::find($category_id)->update([
                'category_name'=>$request->category_name,
               
            ]);
            $notification=array(
                'message'=>'Category updated successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('all.category')->with($notification);
        }
        
    }
    // end herer

    public function DeleteCategory($id){
        $item=Category::find($id);
        $img=$item->image;
        unlink($img);

        Category::find($id)->delete();
        $notification=array(
            'message'=>'Category Deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
    // end function

    // all city method in herer
    public function AllCity()
    {
        $city=City::latest()->get();
        return view('admin.backend.city.all_city',compact('city'));
    }
    // ends herer

    public function StoreCity(Request $request)
    {
        City::create([
            'city_name'=>$request->city_name,
            'city_slug'=>strtolower(str_replace(' ','-',$request->city_name))
        ]);
        $notification=array(
            'message'=>'City added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.city')->with($notification);
    }
    // end herer

    public function EditCity($id)
    {
        $city=City::find($id);
        return response()->json($city);
    }
    // ends hre

    public function UpdateCity(Request $request)
    {
        $city_id=$request->cat_id;
        City::find($city_id)->update([
            'city_name'=>$request->city_name,
            'city_slug'=>strtolower(str_replace(' ','-',$request->city_name))
        ]);
        $notification=array(
            'message'=>'City updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    // ends here

    public function DeleteCity($id)
    {
        City::find($id)->delete();
        $notification=array(
            'message'=>'City Deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    // ends here
}
