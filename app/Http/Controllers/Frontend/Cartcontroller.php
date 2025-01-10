<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Cartcontroller extends Controller
{
    public function AddToCart($id){
        $products=Product::find($id);
        $cart=session()->get('cart',[]);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $priceToShow=isset($products->discount_price)?$products->discount_price:$products->price;
            $cart[$id]=[
                'id'=>$id,
                'name'=>$products->name,
                'image'=>$products->image,
                'price'=>$priceToShow,
                'client_id'=>$products->client_id,
                'quantity'=>1
            ];
        }
        session()->put('cart',$cart);
        // return response()->json($cart);
        $notification=array(
            'message'=>'Add to cart successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    // end method
}
