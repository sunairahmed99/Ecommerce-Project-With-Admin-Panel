<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\areamodel;
use App\Models\shippingmodel;

class areacontroller extends Controller
{
    public function viewarea(){


        $shipping = shippingmodel::all();
        $data = areamodel::with('dis')->OrderBy('id', 'DESC')->get();


        return view('backend.viewarea',compact('data', 'shipping'));

    }

    function addarea(Request $request){

        $data = new areamodel();

        $data->district_name =  $request->area;
        $data->div_id = $request->div;

        $data->save();

        return redirect()->route('area.view');

    }

    public function editarea($id){

        $dis = shippingmodel::all();
        $data = areamodel::find($id);

        return view('backend.editarea', compact('data', 'dis'));

    }

    public function updatearea(Request $request, $id){

        $data = areamodel::find($id);

        $data->div_id = $request->dname;
        $data->district_name = $request->area;
        $data->save();

        return redirect()->route('area.view');

    }

    public function delarea($id){

        $data = areamodel::find($id)->delete();

        return redirect()->route('area.view');

    }
}
