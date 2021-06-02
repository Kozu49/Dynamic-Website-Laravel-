<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;

use Illuminate\Support\Carbon;
use Image;
use Auth;
class BrandController extends Controller
{
    public function index(){
        $brands=Brand::all();

        return view ('admin.brand.index',['brands'=>$brands]);
    }

    public function store(Request $request){

        $validatedData=$request->validate([
            'brand_name'=>'required|max:255',
            'brand_image'=>'required|mimes:jpg,jpeg,png',
        ],
    
        [
            'brand_name.required'=>'please insert',
            'brand_image.min'=>'please insert',
        ]);

        $brand_image=$request->file('brand_image');
        $name_gen=hexdec(uniqid());
        $img_ext=strtolower($brand_image->getClientOriginalExtension());
        $img_name=$name_gen. '.'.$img_ext;
        $up_location='image/brand/';
        $last_img=$up_location.$img_name;
        $brand_image->move($up_location,$img_name);

        // $brand_image=$request->file('brand_image');
        // $name_gen=hexdec(uniqid());
        // $img_ext=strtolower($brand_image->getClientOriginalExtension());
        // $img_name=$name_gen. '.'.$img_ext;
        // Image::make($brand_image)->resize(300,300)->save('image/brand/'.$img_name);
        
        // $last_img='image/brand/'.$img_name;

        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,
            'created_at'=>Carbon::now(),


        ]);
        $notification=array(
                'message'=> 'brand inserted successfull',
                'alert-type'=>'success'

        );
            return redirect()->back()->with($notification);

    }


    public function edit($id){
        $brands=Brand::find($id);
        return view('admin.brand.edit',['brands'=>$brands]);


    }
    public function update(Request $request,$id){


        
        $validatedData=$request->validate([
            'brand_name'=>'required|max:255',
            
        ],
    
        [
            'brand_name.required'=>'please insert',
        ]);
        $old_image=$request->old_image;
        

        $brand_image=$request->file('brand_image');
        if($brand_image){
            $name_gen=hexdec(uniqid());
        $img_ext=strtolower($brand_image->getClientOriginalExtension());
        $img_name=$name_gen. '.'.$img_ext;
        $up_location='image/brand/';
        $last_img=$up_location.$img_name;
        $brand_image->move($up_location,$img_name);
        unlink($old_image);

        Brand::find($id)->update([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,
            'created_at'=>Carbon::now(),


        ]);
            return redirect()->route('all.brand')->with('success','brand updated successfully');



        }
        else{
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                
                'created_at'=>Carbon::now(),
    
    
            ]);
                return redirect()->route('all.brand')->with('success','brand updated successfully');
    
    

        }
        
    }

    public function delete($id){
        
        $image=Brand::find($id);
        $old_image=$image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return redirect()->back()->with('success','brand deleted successfully');

    }

    public function Multipic(){
        $images=multipic::all();
        return view('admin.multipic.index',['images'=>$images]);
    }

    public function storeimg(Request $request){

        $validatedData=$request->validate([
            'image'=>'required|max:255',
        ],
    
        [
            'image.required'=>'please insert',
        ]);

        $image=$request->file('image');
        foreach($image as $multi_img){
       
        $name_gen=hexdec(uniqid());
        $img_ext=strtolower($multi_img->getClientOriginalExtension());
        $img_name=$name_gen. '.'.$img_ext;
        $up_location='image/multi/';
        $last_img=$up_location.$img_name;
        $multi_img->move($up_location,$img_name);

        
        Multipic::insert([
            'image'=>$last_img,
            'created_at'=>Carbon::now(),


        ]);

    }
            return redirect()->back()->with('success','multi inserted successfully');


    }
    
    public function logout(){
        Auth::logout();
        return Redirect()->route('login');
    }
}
