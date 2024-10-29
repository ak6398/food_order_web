<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function AllCoupon()
    {
        $coupon=Coupon::latest()->get();
        return view('client.backend.coupon.all_coupon',compact('coupon'));
    }
    // ends function

    public function AddCoupon()
    {
        return view('client.backend.coupon.add_coupon');
    }
    // ends function

    public function StoreCoupon()
    {

    }
    // end function


}
