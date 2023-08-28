<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\shippingmodel;
use App\Models\areamodel;
use App\Models\statemodel;
use App\Models\order;
use App\Models\orderItem;
use Carbon\Carbon;



class checkoutcontroller extends Controller
{
    public function viewcheckout(){

        if(Auth::check()){

            if(Cart::total() > 0){

        $carts = Cart::content();
        $cartQty = Cart::Count();
        $cartTotal = Cart::priceTotal();
        $Division = shippingmodel::orderBy('id', 'DESC')->get();

                return view('frontend.checkout',compact('carts', 'cartQty', 'cartTotal','Division'));

            }
            else{

                return redirect()->route('Home.pagee');

            }

        }
        else{

            return redirect()->route('dashboard');
        }
    }

    public function viewdiv($id){

        $area = areamodel::where('div_id',$id)->orderBy('district_name', 'ASC')->get();


        return response()->json(array(

            'area' => $area,

        ));
    }

    public function viewstate($id){

        $state = statemodel::where('area_id', $id)->OrderBy('area_name', 'ASC')->get();

        return response()->json(array(

            'state' => $state

        )); 
    }

    public function checkoutpost(Request $request){

        

        $data = array();

        $data['shipping_name'] = $request->name;
        $data['shipping_email'] = $request->email;
        $data['shipping_phone'] = $request->phone;
        $data['post_code'] = $request->code;
        $data['state_id'] = $request->state;
        $data['division_id'] = $request->division;
        $data['district_id'] = $request->district;
        $data['order_id'] = $request->order;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::priceTotal();
        

        if($request->payment ==='stripe'){

            return view('frontend.stripe',compact('cartTotal','data'));
        }
        elseif($request->payment === 'card'){

            return view('frontend.card');

        }
        else{

            return view('frontend.cash',compact('cartTotal','data'));

        }
    }

    public function viewstripe(){

      

      

    }

    public function stripepost(Request $request){

        $cartTotal = Cart::total();
        

        \Stripe\Stripe::setApiKey('sk_test_51Mh7VzHd2K7SQ05wzHCSR3xCxmgb3MlFqfa6w3Xt5sqfHmY1auGYpAH3u5ysrboYKx0DFHbTDbJ9wnhk74nsLiLs001kWUDpl5');    

        $token = $_POST['stripeToken'];
	$charge = \Stripe\Charge::create([
	  'amount' => $cartTotal*100,
	  'currency' => 'usd',
	  'description' => 'Easy Online Store',
	  'source' => $token,
	  'metadata' => ['order_id' => uniqid()],
	]);

	

    $order_id = order::insertGetId([
        'user_id' => Auth::id(),
        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'state_id' => $request->state_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'post_code' => $request->post_code,
        'notes' => $request->notes,

        'payment_type' => 'Stripe',
        'payment_method' => 'Stripe',
        'payment_type' => $charge->payment_method,
        'transaction_id' => $charge->balance_transaction,
        'currency' => $charge->currency,
        'amount' => $cartTotal,
        'order_number' => $charge->metadata->order_id,

        'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
        'order_date' => Carbon::now()->format('d F Y'),
        'order_month' => Carbon::now()->format('F'),
        'order_year' => Carbon::now()->format('Y'),
        'status' => 'Pending',
        'created_at' => Carbon::now(),	 

    ]);


    $carts = Cart::content();
    foreach ($carts as $cart) {
        OrderItem::insert([
            'order_id' => $order_id, 
            'product_id' => $cart->id,
            'color' => $cart->options->color,
            'size' => $cart->options->size,
            'qty' => $cart->qty,
            'price' => $cart->price,
            'created_at' => Carbon::now(),

        ]);
    }

    Cart::destroy();

    return redirect()->route('Home.pagee');
    }


    public function cashpost(Request $request){



        $cartTotal = Cart::total();
        


	

    $order_id = order::insertGetId([
        'user_id' => Auth::id(),
        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'state_id' => $request->state_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'post_code' => $request->post_code,
        'notes' => $request->notes,

        'payment_type' => 'Cash',
        'payment_method' => 'Cash',
        'transaction_id' => 'null',
        'currency' => 'usd',
        'amount' => $cartTotal,
        'order_number' => 'null',

        'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
        'order_date' => Carbon::now()->format('d F Y'),
        'order_month' => Carbon::now()->format('F'),
        'order_year' => Carbon::now()->format('Y'),
        'status' => 'Pending',
        'created_at' => Carbon::now(),	 

    ]);


    $carts = Cart::content();
    foreach ($carts as $cart) {
        OrderItem::insert([
            'order_id' => $order_id, 
            'product_id' => $cart->id,
            'color' => $cart->options->color,
            'size' => $cart->options->size,
            'qty' => $cart->qty,
            'price' => $cart->price,
            'created_at' => Carbon::now(),

        ]);
    }

    Cart::destroy();

    return redirect()->route('Home.pagee');

    }
}
