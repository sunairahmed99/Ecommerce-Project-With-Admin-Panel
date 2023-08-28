<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;


use Illuminate\Http\Request;

class adminprofilecontroller extends Controller
{
    public function profile(){

        $data = Admin::find(1);
       // dd($data['data']->toArray());
        return view('backend.profile',compact('data'));
    }

    public function profileedit($id){

        $data = Admin::find($id);

        return view('backend.profileedit',compact('data'));

    }

    public function profileupdate(Request $request,$id){
        $data = Admin::find($id);

        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/admin_image').$data['profile_photo_path']);
          

            $filepath = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$filepath);
            $data->profile_photo_path = $filepath;
        }
        $data->save();

        return redirect()->route('admin.profile');
    }

    public function profilepass(){

         return view('backend.profilepass');
    }

    public function profilepassupdate(Request $request){

   

        $adminpass = Admin::find(1)->password;

        if(Hash::check($request->old_password,$adminpass)){
            
            $admin = Admin::find(1);

            $admin->password = Hash::make($request->new_password);
            $admin->save();

            return redirect()->route('admin.logout');
        }
        else{
            return redirect()->back();
        }

    }
}
