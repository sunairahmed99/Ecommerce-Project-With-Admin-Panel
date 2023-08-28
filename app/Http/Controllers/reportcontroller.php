<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\order;
use App\Models\User;

class reportcontroller extends Controller
{
    public function viewreport(){

        return view('backend.viewreport');
    }

    public function datereport(Request $request){

        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');

        $orders = order::where('order_date',$formatDate)->latest()->get();

        return view('backend.dateorders',compact('orders'));
    }

    

    public function monthreport(Request $request){

        $month = $request->month;
        $year = $request->year;

        $orders = order::where('order_month',$month)->where('order_year',$year)->latest()->get();

        return view('backend.monthorders',compact('orders'));
    }

    public function yearreport(Request $request){

        $month = $request->month;
        $year = $request->year;

        $orders = order::where('order_year',$year)->latest()->get();

        return view('backend.yearorders',compact('orders'));
    }

    public function viewuser(){

        $user = User::all();

        return view('backend.viewuser',compact('user'));

    }
}
