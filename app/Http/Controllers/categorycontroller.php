<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorymodel;
use Image;

class categorycontroller extends Controller
{
    public function viewcat(){

        $data = categorymodel::all();

        return view('backend.viewcat',compact('data'));
    }

    public function addcategory(Request $request){

        $cat = new categorymodel();

        $cat->catnam_eng = $request->ceng;
        $cat->catname_urdu = $request->curdu;
        $cat->slug_eng = strtolower(str_replace(' ', '_', $request->ceng));
        $cat->slug_urdu = strtolower(str_replace(' ', '_', $request->curdu));

        $file = $request->file('image');
        $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(300,300)->save('upload/categories/'.$filename);
        $save = 'upload/categories/'.$filename;
        $cat->cat_icon = $save;

        $cat->save();

        return redirect()->route('view.cat');
    }

    public function editcat($id){
        $data = categorymodel::find($id);
        return view('backend.editcat', compact('data'));
    }

    public function updatecat(Request $request, $id){

        $cat = categorymodel::find($id);
        $oldimage = $request->old_image;

        if($request->file('image')){
        unlink($oldimage);    
        $cat->catnam_eng = $request->ceng;
        $cat->catname_urdu = $request->curdu;
        $cat->slug_eng = strtolower(str_replace(' ', '_', $request->ceng));
        $cat->slug_urdu = strtolower(str_replace(' ', '_', $request->curdu));

        $file = $request->file('image');
        $filename = hexdec(uniqid()).'.'.$file->getClientOriginalName();
        Image::make($file)->resize(300,300)->save('upload/categories/'.$filename);
        $save = 'upload/categories/'.$filename;
        $cat->cat_icon = $save;

        $cat->save();

        return redirect()->route('view.cat');

        }
        else{

            $cat->catnam_eng = $request->ceng;
            $cat->catname_urdu = $request->curdu;
            $cat->slug_eng = strtolower(str_replace(' ', '_', $request->ceng));
            $cat->slug_urdu = strtolower(str_replace(' ', '_', $request->curdu));
    
            $cat->save();

            return redirect()->route('view.cat');

        }
    }

    public function delcat($id){
        $data = categorymodel::find($id)->delete();
        return redirect()->route('view.cat');

    }

   
}
