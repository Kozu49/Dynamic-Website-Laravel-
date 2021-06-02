<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function index(){
        $homeabouts=HomeAbout::all();
        return view('admin.about.index',['homeabouts'=>$homeabouts]);
    }

    public function addabout(){
        return view('admin.about.create');
    }

    public function storeabout(Request $request){
    
        HomeAbout::insert([
            'title'=>$request->title,
            'short_des'=>$request->short_des,
            'long_des'=>$request->long_des,
            
            'created_at'=>Carbon::now(),
        


        ]);
            return redirect()->route('home.about')->with('success','About Details inserted successfully');


    }

    public function edit($id){
        $about=HomeAbout::find($id);
        return view('admin.about.edit',['about'=>$about]);


    }

    public function update(Request $request,$id){

        HomeAbout::find($id)->update([
            'title'=>$request->title,
            'short_des'=>$request->short_des,
            'long_des'=>$request->long_des,
            'created_at'=>Carbon::now(),


        ]);
            return redirect()->route('home.about')->with('success','About updated successfully');
   
        
    }

    public function delete($id){
        
        HomeAbout::find($id)->delete();
        return redirect()->route('home.about')->with('success','About deleted successfully');

    }

}
