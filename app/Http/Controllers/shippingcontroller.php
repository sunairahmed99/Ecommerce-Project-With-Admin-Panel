<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shippingmodel;

class shippingcontroller extends Controller
{
    public function viewdivision(){

        $shipping = shippingmodel::OrderBy('id', 'DESC')->get();

        return view('backend.viewdivision', compact('shipping'));
    }

    public function adddivision(Request $request){

        $data = new shippingmodel();

        $data->Division_name = $request->dname;
        $data->save();

        return redirect()->route('division.view');
    }

    public function editdivision($id){
        $data = shippingmodel::find($id);

        return view('backend.editdivision', compact('data'));
    }

    public function updatedivision(Request $request, $id){

        $data = shippingmodel::find($id);

        $data->Division_name = $request->dname;
        $data->save();

        return redirect()->route('division.view');

    }

    public function deldivision($id){

        $data = shippingmodel::find($id)->delete();
        return redirect()->route('division.view');

    }
}
