<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class cartpagecontroller extends Controller
{
    
    public function viewcartpage(){

        return view('frontend.cartpage');
    }


    public function addcart(){

        $carts = Cart::content();
        $cartqty = Cart::Count();
        $cartotal = Cart::priceTotal();

        return response()->json(array(
            'carts'=> $carts,
            'cartqty'=>$cartqty,
            'cartotal'=>round($cartotal),
        ));  
    }

    public function delcart($id){

        Cart::remove($id);

        return response()->json(['success', 'your cart has been removed successfully']); 
    }

    public function addedcart($id){

        $row = Cart::get($id);
        Cart::update($id, $row->qty +1);

        return response()->json(['success'=> 'updated successfully']);

    }

    public function deccart($id){
        $row = Cart::get($id);
        Cart::update($id, $row->qty -1);

        return response()->json(['success'=> 'updated successfully']);
    }


    

}
