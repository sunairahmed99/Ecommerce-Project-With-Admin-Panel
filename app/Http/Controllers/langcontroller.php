<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class langcontroller extends Controller
{
    public function englang(){
        session()->get('language');
        session()->forget('language');
        session::put('language', 'english');

        return redirect()->back();
    }

    public function urdulang(){
        session()->get('language');
        session()->forget('language');
        session::put('language', 'urdu');

        return redirect()->back();
    }
}
