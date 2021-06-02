<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function homeslider(){
        $sliders=Slider::all();

        return view('admin.slider.index',['sliders'=>$sliders]);
    }

    public function addslider(){
        return view('admin.slider.create');
    }

    public function storeslider(Request $request){
        // $validatedData=$request->validate([
        //     'title'=>'required|max:255',
        //     'description'=>'required|mimes:jpg,jpeg,png',
        // ],
    
        // [
        //     'title.required'=>'please insert title',
        //     'description.required'=>'please description',
            
        // ]);

        $slider_image=$request->file('image');
        $name_gen=hexdec(uniqid());
        $img_ext=strtolower($slider_image->getClientOriginalExtension());
        $img_name=$name_gen. '.'.$img_ext;
        $up_location='image/slider/';
        $last_img=$up_location.$img_name;
        $slider_image->move($up_location,$img_name);


        Slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$last_img,
            'created_at'=>Carbon::now(),
        


        ]);
            return redirect()->route('home.slider')->with('success','Slider inserted successfully');


    }


    public function edit($id){
        $slider=Slider::find($id);
        return view('admin.slider.edit',['slider'=>$slider]);


    }



    public function update(Request $request,$id){


        
        // $validatedData=$request->validate([
        //     'brand_name'=>'required|max:255',
            
        // ],
    
        // [
        //     'brand_name.required'=>'please insert',
        // ]);
        $old_image=$request->old_image;
        

        $slider_image=$request->file('image');
        if($slider_image){
            $name_gen=hexdec(uniqid());
        $img_ext=strtolower($slider_image->getClientOriginalExtension());
        $img_name=$name_gen. '.'.$img_ext;
        $up_location='image/slider/';
        $last_img=$up_location.$img_name;
        $slider_image->move($up_location,$img_name);
        unlink($old_image);

        Slider::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$last_img,
            'created_at'=>Carbon::now(),


        ]);
            return redirect()->route('home.slider')->with('success','slider updated successfully');



        }
        else{
            Slider::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                
                'created_at'=>Carbon::now(),
    
    
            ]);
                return redirect()->route('home.slider')->with('success','slider updated successfully');
    
    

        }
        
    }

    public function delete($id){
        
        $slider=Slider::find($id);
        $old_image=$slider->image;
        unlink($old_image);

        Slider::find($id)->delete();
        return redirect()->route('home.slider')->with('success','slider deleted successfully');

    }
}
