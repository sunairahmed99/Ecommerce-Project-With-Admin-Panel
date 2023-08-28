<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subsubmodel;
use App\Models\categorymodel;
use App\Models\subcatmodel;
use Image;
class Subsubcontroller extends Controller
{
    public function viewSubsubcat(){

        $data['cat'] = categorymodel::all();
        $data['sub'] = subcatmodel::all();
        $data['data'] = Subsubmodel::all();

        return view('backend.viewSubsubcategory',$data);
    }

    public function addSubsubcategory(Request $request){

        $Subsubcat = new Subsubmodel();

        $Subsubcat->cat_id = $request->catname;
        $Subsubcat->sub_id = $request->subname;
        $Subsubcat->sub_eng = $request->ceng;
        $Subsubcat->sub_urdu = $request->curdu;
        $Subsubcat->slug_eng = strtolower(str_replace(' ', '_', $request->ceng));
        $Subsubcat->slug_urdu = strtolower(str_replace(' ', '_', $request->curdu));

        $file = $request->file('image');
        $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(300,300)->save('upload/Subsub/'.$filename);
        $save = 'upload/Subsub/'.$filename;
        $Subsubcat->image = $save;

        $Subsubcat->save();

        return redirect()->route('view.sub.subcat');
    }

    public function editsubcat($id){
        $data['cat'] = categorymodel::all();
        $data['sub'] = subcatmodel::all();
        $data['data'] = Subsubmodel::find($id);
        return view('backend.editSubsubcat',$data);
    }

    public function updatesubcat(Request $request, $id){

        $cat = Subsubmodel::find($id);
        $oldimage = $request->old_image;

        if($request->file('image')){
        unlink($oldimage);

        $cat->cat_id = $request->catname;
        $cat->sub_id = $request->subname;    
        $cat->sub_eng = $request->ceng;
        $cat->sub_urdu = $request->curdu;
        $cat->slug_eng = strtolower(str_replace(' ', '_', $request->ceng));
        $cat->slug_urdu = strtolower(str_replace(' ', '_', $request->curdu));

        $file = $request->file('image');
        $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(300,300)->save('upload/Subsub/'.$filename);
        $save = 'upload/Subsub/'.$filename;
        $cat->image = $save;

        $cat->save();

        return redirect()->route('view.sub.subcat');

        }
        else{

            $Subsubcat->cat_id = $request->catname;
            $Subsubcat->sub_id = $request->subname;
            $cat->catnam_eng = $request->ceng;
            $cat->catname_urdu = $request->curdu;
            $cat->slug_eng = strtolower(str_replace(' ', '_', $request->ceng));
            $cat->slug_urdu = strtolower(str_replace(' ', '_', $request->curdu));
    
            $cat->save();

            return redirect()->route('view.sub.subcat');

        }
    }

    public function delcat($id){
        $data = Subsubmodel::find($id)->delete();
        return redirect()->route('view.cat');

    }
}
