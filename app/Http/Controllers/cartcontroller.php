<?php

namespace App\Http\Controllers;
use App\Models\productmodel;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class cartcontroller extends Controller
{
    public function addtocart(Request $request,$id){

        $product = productmodel::findOrFail($id);

        if($product->discount_price == NULL){
            
            Cart::add([
            'id' => $id, 
            'name' => $request->proname, 
            'qty' => $request->qty,  
            'price'=>$product->selling_price, 
            'weight'=> 1,
            'options' => ['img' => $product->pro_thumbnail, 'color' => $request->color, 'size' => $request->size]]);

            return response()->json(['successs', 'your item has been addded successfully']);

        }
        else{

            Cart::add([
                'id' => $id, 
                'name' => $request->proname, 
                'qty' => $request->qty, 
                'color' => $request->color, 
                'size' => $request->size,
                'price'=>$product->newprice,
                'weight'=> 0, 
                'options' => ['img' => $product->pro_thumbnail,'oldprice' =>$product->selling_price, 'slug_eng' =>$product->slug_eng, 'color' => $request->color, 'size' => $request->size]]);

                return response()->json(['successs', 'your item has been addded successfully']);

        }

    }

    public function addminicart(){

        

        $carts = Cart::content();
        $cartqty = Cart::Count();
        $cartotal = Cart::priceTotal();

        return response()->json(array(
            'carts'=> $carts,
            'cartqty'=>$cartqty,
            'cartotal'=>round($cartotal),
        ));

    }

    public function delminicart($rowId){
        Cart::remove($rowId);

        return response()->json(['success' => 'your item has been deleted successfully']);
    }













}
