<?php

namespace App\Http\Controllers;
use App\Models\productmodel;
use App\Models\User;
use Auth;
use App\Models\whishmodel;

use Illuminate\Http\Request;
use Carbon\Carbon;

class whishlistcontroller extends Controller
{
    public function addwhish(Request $request, $id){

       
    
        if(Auth::check()){

            //dd('hello wordl');

            $whish = whishmodel::where('user_id', Auth::id())->where('pro_id',$id)->first();

            if(!$whish){

                whishmodel::insert([
            
                    'user_id' => Auth::id(),
                    'pro_id' => $id,
                    'created_at' => Carbon::now(),
    
                ]);
    
                return response()->json(['success' => 'your item has been added in whishlist ']);

            }
            else{
                return response()->json(['error' => 'your item already in whishlist']);

            }


        }
        else{

           // dd('hello wordl');

            return response()->json(['error' => 'please login first ']);   
        }

    }

    public function viewwhish(){
        return view('frontend.whishview');
    }

    public function wishview(){
        $data = whishmodel::with('pro')->where('user_id', Auth::id())->latest()->get();

        return response()->json($data);
    }

    function delwish($id){

        $pro = whishmodel::where('user_id', Auth::id())->where('pro_id', $id)->delete();

        return response()->json(['success' => 'your item has bees removed successfully']);

    }
}
