<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productmodel;
use App\Models\categorymodel;
use App\Models\subcatmodel;
use App\Models\Subsubmodel;
use App\Models\brandmodel;
use App\Models\multiimage;
use Image;


class productcontroller extends Controller
{
    public function viewproduct(){

        $data['data'] = productmodel::with(['catname', 'subcat', 'Subsub'])->latest()->get();
        return view('backend.viewproduct',$data);
    }

    public function addproduct(){

        $data['brand'] = brandmodel::all();
        $data['cat'] = categorymodel::all();
        $data['subsub'] = Subsubmodel::all();
        $data['subcat'] = subcatmodel::all();

        return view('backend.addproduct',$data);
    }

    public function productadd(Request $request){

        $data = new productmodel();

        $file = $request->file('image');
        $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(917,1000)->save('upload/products/'.$filename);
        $saveimage = 'upload/products/'.$filename;

        $sel = $request->psel - $request->pdis;
        $new = ($sel/$request->psel) * 100;
        
        $data->brand_id = $request->bname;
        $data->cat_id = $request->catname;
        $data->sub_id = $request->subname;
        $data->Subsub_id = $request->Subsubname;
        $data->proname_eng = $request->pnameng;
        $data->proname_urdu = $request->pnameurdu;
        $data->slug_eng = strtolower(str_replace(' ', '_', $request->pnameng ));
        $data->slug_urdu = strtolower(str_replace(' ', '_', $request->pnameurdu ));
         $data->pro_code = $request->pcode;
         $data->pro_qty = $request->pqty;
         $data->protags_eng = $request->ptagseng;
         $data->protags_urdu = $request->ptagsurdu;
         $data->prosize_eng = $request->psizeng;
         $data->prosize_urdu = $request->psizeurdu;
         $data->procolor_eng = $request->pclreng;
         $data->procolor_urdu = $request->pclrurdu;
         $data->selling_price = $request->psel;
         $data->discount_price = $request->pdis;
         $data->newprice = $new;
         $data->shortdesc_eng = $request->pshorteng;
         $data->shortdesc_urdu = $request->pshorturdu;
         $data->longdesc_eng = $request->plongeng;
         $data->longdesc_urdu = $request->plongurdu;
         $data->hot_deals = $request->hot_deals;
         $data->featured = $request->featured;
         $data->special_offer = $request->special_offer;
         $data->special_deal = $request->special_deals;
         $data->status = '1';
         $data->pro_thumbnail = $saveimage;
        
         $data->save();
        
         $mfile = $request->file('mimage');
         foreach($mfile as $mimage){

            $multi = new  multiimage(); 

            $mfilename = hexdec(uniqid()).'.'.$mimage->getClientOriginalExtension();
            Image::make($mimage)->resize(917,1000)->save('upload/multipro/'.$mfilename);
            $msaveimage = 'upload/multipro/'.$mfilename;
            $multi->pro_id = $data->id;
            $multi->photo_name = $msaveimage;
            $multi->save();
         }    

         return redirect()->route('view.products');
    }

    public function editproduct($id){

        $data['brand'] = brandmodel::all();
        $data['cat'] = categorymodel::all();
        $data['subsub'] = Subsubmodel::all();
        $data['subcat'] = subcatmodel::all();
        $data['mimage'] = multiimage::where('pro_id', $id)->get();

        $data['pro'] = productmodel::where('id', $id)->first();
        //dd($data['data']->toArray());

        return view('backend.editproduct', $data);
     }

     public function updateproduct(Request $request,$id){

        $data = productmodel::where('id', $id)->first();
        $old_timage = $request->old_image;

       
        
        if($request->file('timage')){
        

        unlink($old_timage);    
        $tfile = $request->file('timage');
        $tfilename = hexdec(uniqid()).'.'.$tfile->getClientOriginalExtension();
        Image::make($tfile)->resize(917,1000)->save('upload/products/'.$tfilename);
        $tsave = 'upload/products/'.$tfilename;
        

        $data->brand_id = $request->bname;
        $data->cat_id = $request->catname;
        $data->sub_id = $request->subname;
        $data->Subsub_id = $request->Subsubname;
        $data->proname_eng = $request->pnameng;
        $data->proname_urdu = $request->pnameurdu;
        $data->slug_eng = strtolower(str_replace(' ', '_', $request->pnameng ));
        $data->slug_urdu = strtolower(str_replace(' ', '_', $request->pnameurdu ));
         $data->pro_code = $request->pcode;
         $data->pro_qty = $request->pqty;
         $data->protags_eng = $request->ptagseng;
         $data->protags_urdu = $request->ptagsurdu;
         $data->prosize_eng = $request->psizeng;
         $data->prosize_urdu = $request->psizeurdu;
         $data->procolor_eng = $request->pclreng;
         $data->procolor_urdu = $request->pclrurdu;
         $data->selling_price = $request->psel;
         $data->discount_price = $request->pdis;
         $data->shortdesc_eng = $request->pshorteng;
         $data->shortdesc_urdu = $request->pshorturdu;
         $data->longdesc_eng = $request->plongeng;
         $data->longdesc_urdu = $request->plongurdu;
         $data->hot_deals = $request->hot_deals;
         $data->featured = $request->featured;
         $data->special_offer = $request->special_offer;
         $data->special_deal = $request->special_deals;
         $data->status = '1';

         $data->pro_thumbnail = $tsave;
         $data->save();

         return redirect()->route('view.products');
        } 
        else{
            
        $data->brand_id = $request->bname;
        $data->cat_id = $request->catname;
        $data->sub_id = $request->subname;
        $data->Subsub_id = $request->Subsubname;
        $data->proname_eng = $request->pnameng;
        $data->proname_urdu = $request->pnameurdu;
        $data->slug_eng = strtolower(str_replace(' ', '_', $request->pnameng ));
        $data->slug_urdu = strtolower(str_replace(' ', '_', $request->pnameurdu ));
         $data->pro_code = $request->pcode;
         $data->pro_qty = $request->pqty;
         $data->protags_eng = $request->ptagseng;
         $data->protags_urdu = $request->ptagsurdu;
         $data->prosize_eng = $request->psizeng;
         $data->prosize_urdu = $request->psizeurdu;
         $data->procolor_eng = $request->pclreng;
         $data->procolor_urdu = $request->pclrurdu;
         $data->selling_price = $request->psel;
         $data->discount_price = $request->pdis;
         $data->shortdesc_eng = $request->pshorteng;
         $data->shortdesc_urdu = $request->pshorturdu;
         $data->longdesc_eng = $request->plongeng;
         $data->longdesc_urdu = $request->plongurdu;
         $data->hot_deals = $request->hot_deals;
         $data->featured = $request->featured;
         $data->special_offer = $request->special_offer;
         $data->special_deal = $request->special_deals;
         $data->status = '1';

        
         $data->save();

         return redirect()->route('view.products');
        }  
     }

     public function updateproductimage(Request $request){
        $image = $request->mimg;

        foreach($image as $id => $mimg){
            
            $mult = multiimage::findOrFail($id);

            unlink($mult->photo_name);


            $mfilenam = hexdec(uniqid()).'.'.$mimg->getClientOriginalExtension();
            Image::make($mimg)->resize(917,1000)->save('upload/multipro/'.$mfilenam);
            $msaveimag = 'upload/multipro/'.$mfilenam;
            
            
            multiimage::where('id',$id)->update([

                'photo_name' => $msaveimag
            ]);

           
        }
        return redirect()->route('view.products');
     }

     public function deletemimage($id){
        $data = multiimage::find($id);
        unlink($data->photo_name);
        multiimage::find($id)->delete();

        return redirect()->back();

     }

     public function deactive($id){

        $deactive = productmodel::find($id)->update(['status' => '0']);

       

        return redirect()->route('view.products');



     }

     public function active($id){

        $deactive = productmodel::find($id)->update(['status' => '1']);
        return redirect()->route('view.products');
     }

     public function delproduct($id){

        $data = productmodel::find($id);
        unlink($data->pro_thumbnail);
        productmodel::find($id)->delete();

        $mdata = multiimage::where('pro_id', $id)->get();

        foreach($mdata as $img){

            unlink($img->photo_name);

            multiimage::where('pro_id', $id)->delete();
        }
        return redirect()->route('view.products');

     }
}
