<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\couponmodel;

class couponcontroller extends Controller
{
    public function viewcoupon(){

        $coupon = couponmodel::OrderBy('id', 'DESC')->get();
        return view('backend.couponview',compact('coupon'));
    }

    public function addcoupon(Request $request){

        $data = new couponmodel();

        $data->coupon_name = $request->cname;
        $data->copon_discount = $request->cdis;
        $data->coupon_validity = $request->cvalidity;
        $data->coupon_status = '1';
        $data->save();

        return redirect()->route('coupon.view');
    }

    public function editcoupon($id){

        $coupon = couponmodel::find($id);

        return view('backend.editcoupon',compact('coupon'));

    }

    public function updatecoupon(Request $request, $id){

        $coupon = couponmodel::find($id);

        $coupon->coupon_name = $request->cname;
        $coupon->copon_discount = $request->cdis;
        $coupon->coupon_validity = $request->cvalidity;
        $coupon->coupon_status = $request->cstatus;

        $coupon->save();

        return redirect()->route('coupon.view');
    }

    public function delcoupon($id){

        $data = couponmodel::find($id)->delete();

        return redirect()->route('coupon.view');

    }
}
