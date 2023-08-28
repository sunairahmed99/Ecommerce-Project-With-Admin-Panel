<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\productmodel;
use App\Models\multiimage;
use App\Models\categorymodel;
use Auth;


class Homecontroller extends Controller
{

   public function userlogin(){
    
    return view('auth.login');
    
   }

   public function userlogout(){
    Auth::logout();

    return redirect()->route('login');
   }




    public function viewHome(){

        $feapro = productmodel::where('featured', '1')->orderBy('id', 'DESC')->limit(5)->get();
        $hotpro = productmodel::where('hot_deals', '1')->where('discount_price', '!=', 'Null')->where('discount_price', '>', '0')->where('discount_price', '!=', '0')->orderBy('id', 'DESC')->limit(6)->get();
        $specialpro = productmodel::where('special_offer', '1')->orderBy('id', 'DESC')->limit(4)->get();
        $dealspro = productmodel::where('special_deal', '1')->orderBy('id', 'DESC')->limit(4)->get();
        $cat = categorymodel::skip(0)->first();
        $elecat = categorymodel::skip(1)->first();
        $fashionpro = productmodel::where('status', '1')->where('cat_id', $cat->id)->orderBy('id', 'DESC')->limit(8)->get();
        $elecpro = productmodel::where('status', '1')->where('cat_id', $elecat->id)->orderBy('id', 'DESC')->limit(8)->get();

        //dd($tags_eng->toArray());


        return view('frontend.Home', compact('feapro', 'hotpro','specialpro','dealspro','fashionpro','cat','elecat', 'elecpro'));
    }

    public function userprofile(){
         return view('frontend.viewprofile');
    }

    public function editprofile(){
        return view('frontend.editprofile');
    }

    public function updateprofile(Request $request){

        $data = Auth::User()->id;
        $user = User::find($data);
        //dd($user->toArray());

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($request->file('image')){
            $image = $request->file('image');
            @unlink(public_path('upload/user_image/').$user['profile_photo_path']);
            $imagepath = date('YmdHi').$image->getClientOriginalName();
            $image->move(public_path('upload/user_image'),$imagepath);
            $user['profile_photo_path'] = $imagepath;
        }
        $user->save();
        return redirect()->route('user.profile');
    }

    public function editpass(){
        return view('frontend.editpass');
    }

 
    public function updatepass(Request $request){
        $data = Auth::user()->password;

        if(Hash::check($request->password, $data)){
            
            $user = User::find(Auth::id());

            $user->password = Hash::make($request->new_password);

            $user->save();

            Auth::logout();
            return redirect()->route('login');
        }
        else{
            return redirect()->back();

        }
    }

    public function detail($id, $slug){

        $pro =productmodel::where('id',$id)->first();
        $mult = multiimage::where('pro_id',$id)->get();

        $color = $pro->procolor_eng;
        $clr = explode(',',$color);

        //dd($clr);

        $size = $pro->prosize_eng;
        $prosize = explode(',',$size);
       // dd($data['mult']->toArray());

        return view('frontend.detail',compact('pro','mult', 'clr', 'prosize'));
    }

    public function protags($tag){

        $subcat = productmodel::where('status', '1')->where('protags_eng',$tag)->orWhere('protags_urdu',$tag)->orderBy('id', 'DESC')->paginate(20);

        $tagspro = productmodel::where('status', '1')->orderBy('id', 'DESC')->get(); 

        //$tagspro = productmodel::where('status', '1')->orderBy('id', 'DESC')->get(); 

       // $tagspro = productmodel::where('status', '1')->where('protags_urdu',$tag)->orderBy('id', 'DESC')->paginate(3);
        //dd($tagspro->toArray());
    

        return view('frontend.tagshow',compact('subcat','tagspro'));

    }

    public function subcatshow($id){

        $subcat = productmodel::where('sub_id',$id)->orderBy('id', 'DESC')->paginate(4);
        $tagspro = productmodel::where('status', '1')->orderBy('id', 'DESC')->get();  
        //dd($subcat->toArray());
        return view('frontend.subcat',compact('subcat', 'tagspro'));
    }

    public function Subsubcat($id,$slug){

        $subcat = productmodel::where('Subsub_id',$id)->orderBy('id', 'DESC')->paginate(20);
       // dd($subcat->toArray());
        $tagspro = productmodel::where('status', '1')->orderBy('id', 'DESC')->get(); 

        return view('frontend.Subsubcat',compact('subcat', 'tagspro'));

    }

    public function categoriesshow($id,$tag){

        $subcat = productmodel::where('cat_id',$id)->orderBy('id', 'DESC')->paginate(20);
        $tagspro = productmodel::where('status', '1')->orderBy('id', 'DESC')->get(); 

        return view('frontend.categoriesshow',compact('subcat', 'tagspro'));
    }

    public function viewmodel($id){
        $pro = productmodel::with('category', 'brand')->findOrFail($id);
        

        $color = $pro->procolor_eng;
        $procolor = explode(',',$color);

        $size = $pro->prosize_eng;
        $prosize = explode(',',$size);

        return response()->json(array(
            'product' => $pro,
            'color' => $procolor,
            'size' => $prosize,

        ));

    }

  
}
