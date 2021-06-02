<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangePasswordController extends Controller
{
    public function cpassword(){

        return view('admin.body.change_password');
    }

    public function updatepassword(Request $request){

        $validated=$request->validate([
            'oldpassword'=> 'required',
            'password'=> 'required|confirmed',
        ]);
        $hashedpassword=Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedpassword)){
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('success','password is changed successfully');
        
        }else{
            return redirect()->back()->with('error','current password is invalid');


        }


    }

    public function pupdate(){

        if(Auth::user()){
            $user=User::find(Auth::id());
            if($user){
                return view('admin.body.update_profile',['user'=>$user]);
            }
        }
    }

    public function updateprofile(Request $request){
        
        $user=User::find(Auth::id());
        if($user){

            // $old_image=$request->old_image;
            
            // $profile_image=$request->file('image');
            // if($profile_image){
            //     $name_gen=hexdec(uniqid());
            // $img_ext=strtolower($profile_image->getClientOriginalExtension());
            // $img_name=$name_gen. '.'.$img_ext;
            // $up_location='image/profile-photo/';
            // $last_img=$up_location.$img_name;
            // $profile_image->move($up_location,$img_name);
            // // unlink($old_image);
        

            $user->name=$request->name;
            $user->email=$request->email;

            $user->save();

            return redirect()->back()->with('success','User profile updated successfully');

        }else{
            return redirect()->back();
        }
    




}

}
