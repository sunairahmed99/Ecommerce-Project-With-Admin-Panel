<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\order;
use App\Models\orderItem;
use PDF;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ordercontroller extends Controller
{
    public function vieworder(){
        $orders =order::where('user_id', Auth::id())->get();
        
        return view('frontend.orderpage',compact('orders'));
    }

    public function orderview($id){

        $order =order::with('division','district','state','user')->where('id',$id)->where('user_id', Auth::id())->first();
        //dd($order->toArray());
        $orderItem = orderItem::with('product')->where('order_id',$id)->orderBy('id', 'DESC')->get();

    //dd($order->toArray());

        return view('frontend.vieworder',compact('order','orderItem'));
    }

    public function viewpdf($id){

        $orders =order::with('division','district','state','user')->where('user_id', Auth::id())->first();
        //dd($order->toArray());
        $orderItem = orderItem::with('product')->where('order_id',$id)->orderBy('id', 'DESC')->get();

        return view('frontend.pdf',compact('orders','orderItem'));

       //dd($order->toArray());

      // $pdf = Pdf::loadView('frontend.pdf',compact('orders','orderItem'));
       //return $pdf->download('invoice.pdf');
    }

    public function reasonpost(Request $request,$id){
        
        order::findOrFail($id)->update([

            'return_reason' => $request->reason,
            'return_date' => Carbon::now()->format('d F Y'),
            'status' => 'return',

        ]);

        return redirect()->back();

    }
}
