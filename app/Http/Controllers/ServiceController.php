<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Carbon;


class ServiceController extends Controller
{
    public function index(){
        $services=Service::all();
        return view('admin.service.index',['services'=>$services]);
    }

    public function addservice(){
        return view('admin.service.create');
    }

    public function storeservice(Request $request){
    
        Service::insert([
            'info'=>$request->info,
            'title'=>$request->title,
            'description'=>$request->description,
            
            'created_at'=>Carbon::now(),
        


        ]);
            return redirect()->route('home.service')->with('success','Service Details inserted successfully');
        }

        public function edit($id){
            $service=Service::find($id);
            return view('admin.service.edit',['service'=>$service]);
    
    
        }

        public function update(Request $request,$id){

            Service::find($id)->update([
                'info'=>$request->info,
                'title'=>$request->title,
                'description'=>$request->description,
                'created_at'=>Carbon::now(),
    
    
            ]);
                return redirect()->route('home.service')->with('success','About updated successfully');
       
            
        }
        public function delete($id){
        
            Service::find($id)->delete();
            return redirect()->route('home.service')->with('success','service deleted successfully');
    
        }

}
