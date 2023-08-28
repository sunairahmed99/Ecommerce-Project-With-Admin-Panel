<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slidermodel;
use Image;

class slidercontroller extends Controller
{
    public function addslider(){

        $slider['data'] = slidermodel::all();
        return view('backend.addslider', $slider);
    }

    public function slideradd(Request $request){

        $slider = new slidermodel();

        $sfile = $request->file('simage');
        $sfilename = hexdec(uniqid()).'.'.$sfile->getClientOriginalExtension();
        Image::make($sfile)->resize(870,370)->save('upload/slider/'.$sfilename);
        $slider_save = 'upload/slider/'.$sfilename;

        $slider->title = $request->title;
        $slider->desc = $request->desc;
        $slider->slider_image = $slider_save;

        $slider->save();

        return redirect()->route('add.slider');
    }

    public function sliderdeactive($id){

        $deactive = slidermodel::find($id)->update(['status' => '0']);
        return redirect()->route('add.slider');

    }

    public function slideractive($id){
        $active = slidermodel::find($id)->update(['status' => '1']);
        return redirect()->route('add.slider');

    }

    public function editslider($id){

        $data = slidermodel::find($id);

        return view('backend.editslider',compact('data'));
    }

    public function updateslider(Request $request, $id){

        $slider = slidermodel::find($id);

        $old_image = $request->old_image;
        if($request->file('simage')){

            unlink($old_image);

            $sfile = $request->file('simage');
            $sfilename = hexdec(uniqid()).'.'.$sfile->getClientOriginalExtension();
            Image::make($sfile)->resize(870,370)->save('upload/slider/'.$sfilename);
            $slider_save = 'upload/slider/'.$sfilename;
    
            $slider->title = $request->title;
            $slider->desc = $request->desc;
            $slider->slider_image = $slider_save;
    
            $slider->save();
            return redirect()->route('add.slider');
        }
        else{

            $slider->title = $request->title;
            $slider->desc = $request->desc;
            $slider->slider_image = $slider_save;
    
            $slider->save();

            return redirect()->route('add.slider');
        }
    }

    public function sliderdel($id){

        $data = slidermodel::find($id)->delete();
        return redirect()->route('add.slider');

    }
}
