<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subcatmodel;
use App\Models\categorymodel;
use Image;

class subcatcontroller extends Controller
{
    public function viewsubcat(){
        $data['data'] = subcatmodel::with('category')->get();
        $data['cat'] = categorymodel::all();
        return view('backend.viewsubcat',$data);
    }

    public function addsubcategory(Request $request){
        $subcat = new subcatmodel();

        $subcat->subcatname_eng = $request->ceng;
        $subcat->subcatname_urdu = $request->curdu;
        $subcat->slug_eng = strtolower(str_replace(' ', '_', $request->ceng)); 
        $subcat->slug_urdu = strtolower(str_replace(' ', '_', $request->curdu));
        $subcat->cat_id = $request->catname;
        
        $file = $request->file('image');
        $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(300,300)->save('upload/subcat/'.$filename);
        $save = 'upload/subcat/'.$filename;

        $subcat->image = $save;

        $subcat->save();

        return redirect()->route('view.subcat');
    }  

    public function editsubcat($id){

        $dat['data'] = subcatmodel::where('id',$id)->first();
        $dat['cat'] = categorymodel::all();
        
       // dd($dat['data']->toArray());

        return view('backend.editsubcat',$dat);
    }

    public function updatesubcat(Request $request, $id){

        $data = subcatmodel::find($id);
        $oldimage = $request->old_image;

        if($request->file('image')){

            $data->subcatname_eng = $request->ceng;
            $data->subcatname_urdu = $request->curdu;
            $data->slug_eng = strtolower(str_replace(' ', '_', $request->ceng));
            $data->slug_urdu = strtolower(str_replace(' ', '_', $request->curdu));
            $file = $request->file('image');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save('upload/subcat/'.$filename);
            $save = 'upload/subcat/'.$filename;
            $data->image = $save;
    
            $data->save();

            return redirect()->route('view.subcat');
        }
        else{

            
            $data->subcatname_eng = $request->ceng;
            $data->subcatname_urdu = $request->curdu;
            $data->slug_eng = strtolower(str_replace(' ', '_', $request->ceng));
            $data->slug_urdu = strtolower(str_replace(' ', '_', $request->curdu));
    
            $data->save();

            return redirect()->route('view.subcat');

        }
    }

    public function delcat($id){

        $data = subcatmodel::find($id)->delete();
        return redirect()->route('view.subcat');

    }
}
