<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\orderItem;
use Auth;

class backordercontroller extends Controller
{
    public function pendingorder(){

        $order = order::where('status', 'pending')->get();

        return view('backend.pendingorder',compact('order'));
    }

    public function pendingvieworder($id){

        $order =order::with('division','district','state','user')->where('id',$id)->first();
        //dd($order->toArray());
        $orderItem = orderItem::with('product')->where('order_id',$id)->orderBy('id', 'DESC')->get();

        //dd($order->toArray());

        return view('backend.penview',compact('order','orderItem'));

    }

        public function confirmorder(){

        $order = order::where('status', 'confirmed')->get();

        return view('backend.confirm',compact('order'));
    }

    public function processorder(){

        $order = order::where('status', 'processing')->get();

        return view('backend.processing',compact('order'));
    }

    public function pickedorder(){

        $order = order::where('status', 'picked')->get();

        return view('backend.pickedorder',compact('order'));
    }

    public function shipedorder(){

        $order = order::where('status', 'shiped')->get();

        return view('backend.shipedorder',compact('order'));
    }

    public function deliveredorder(){

        $order = order::where('status', 'delivered')->get();

        return view('backend.deliveredorder',compact('order'));
    }

    public function cancelorder(){

        $order = order::where('status', 'cancel')->get();

        return view('backend.cancelorder',compact('order'));
    }

    public function corder($id){

        order::findOrFail($id)->update([
            'status' => 'confirmed'
        ]);

        return redirect()->route('pending.order');

        

    }

    public function porder($id){

        order::findOrFail($id)->update([
            'status' => 'processing'
        ]);

        return redirect()->route('confirmed.order');

    }

    public function piorder($id){

        order::findOrFail($id)->update([
            'status' => 'picked'
        ]);

        return redirect()->route('process.order');

    }

    public function shorder($id){

        order::findOrFail($id)->update([
            'status' => 'shiped'
        ]);

        return redirect()->route('picked.order');

    }

    public function dorder($id){

        order::findOrFail($id)->update([
            'status' => 'delivered'
        ]);

        return redirect()->route('shiped.order');

    }

    public function caorder($id){

        order::findOrFail($id)->update([
            'status' => 'cancel'
        ]);

        return redirect()->route('delivered.order');

    }
}
