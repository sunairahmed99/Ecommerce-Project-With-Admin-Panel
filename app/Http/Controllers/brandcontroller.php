<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brandmodel;
use Image;

class brandcontroller extends Controller
{
    public function viewbrand(){

        $data['data'] = brandmodel::all();

        return view('backend.viewbrand', $data);

    }

    public function addbrand(Request $request){

        $data = new brandmodel();

        $image = $request->file('bimg');
        $imagename = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$imagename);
        $save_url = 'upload/brand/'.$imagename;

        $data->name_eng = $request->beng;
        $data->name_urdu = $request->burdu;
        $data->slug_eng  = strtolower(str_replace(' ', '-', $request->beng));
        $data->slug_urdu = strtolower(str_replace(' ', '-', $request->burdu));
        $data->image = $save_url;

        $data->save();

        return redirect()->route('view.brands');
    }

    public function editbrand($id){

        $data = brandmodel::find($id);

        return view('backend.editbrand',compact('data'));
    }

    public function updatebrand(Request $request, $id){

        $data = brandmodel::find($id);

        $oldimage = $request->old_image;

        if($request->file('image')){
            unlink($oldimage);

            $image = $request->file('image');
            $imagepath = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$imagepath);
            $save = 'upload/brand/'.$imagepath;

        $data->name_eng = $request->beng;
        $data->name_urdu =$request->burdu;

        $data->slug_eng = strtolower(str_replace(' ', '_', $request->beng));
        $data->slug_urdu = strtolower(str_replace('', '_', $request->burdu));

        $data->image = $save;

        $data->save();

        return redirect()->route('view.brands');
        }
        else{
            $data->name_eng = $request->beng;
            $data->name_urdu =$request->burdu;
    
            $data->slug_eng = strtolower(str_replace(' ', '_', $request->beng));
            $data->slug_urdu = strtolower(str_replace('', '_', $request->burdu));

            $data->save();

            return redirect()->route('view.brands');

        }
    }
    public function delbrand($id){
        $brand = brandmodel::find($id)->delete();

        return redirect()->route('view.brands');

    }
}
