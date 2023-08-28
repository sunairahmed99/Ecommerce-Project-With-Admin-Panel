<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\areamodel;
use App\Models\shippingmodel;
use App\Models\statemodel;

class statecontroller extends Controller
{
    public function stateview(){

        $shipping = shippingmodel::all();
        $are = areamodel::all();
        $data = statemodel::with('dis','area')->OrderBy('id', 'DESC')->get();
        return view('backend.viewstate',compact('data','shipping','are'));
    }

    public function stateadd(Request $request){
        $data = new statemodel();

        $data->area_name = $request->state;
        $data->area_id = $request->area;
        $data->dis_id = $request->div;
        $data->save();

        return redirect()->route('state.view');
    }

    public function stateedit($id){
        $dis = shippingmodel::all();
        $are = areamodel::all();
        $data = statemodel::with('dis','area')->find($id);
        return view('backend.editstate',compact('data','dis','are'));
    }

    public function stateupdate(Request $request, $id){

        $data = statemodel::find($id);

        $data->area_name = $request->sname;
        $data->dis_id = $request->dname;
        $data->area_id = $request->area;
        $data->save();

        return redirect()->route('state.view');

    }

    public function statedel($id){

        $data = statemodel::find($id)->delete();
        return redirect()->route('state.view');

    }
}
