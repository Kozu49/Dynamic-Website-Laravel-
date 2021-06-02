<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use Auth;
class CategoryController extends Controller
{
    public function index(){

        $category=Category::all();
        $trashdatas=Category::onlyTrashed()->get();
    
        return view('admin.category.index',['categories'=>$category,'trashdatas'=>$trashdatas]);
    }

    public function store(Request $request){
        Category::insert([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=>carbon::now()
        ]);
        Session::flash('category','category was created');
        return back();

    }
    public function edit($id){
        $category=Category::find($id);
        return view('admin.category.edit',['category'=>$category]);
    }
    
    public function update(Request $request,$id){

        $category=Category::find($id);
        $category->update([
            'category_name'=>$request->category_name
        ]);
        return redirect()->route('all.category');
    }

    public function delete($id){
        $category=Category::find($id)->delete();
        return redirect()->route('all.category');


    }

    public function restore($id){
        $category=Category::withTrashed()->restore();
    
        return redirect()->route('all.category');


    }

    public function fdelete(Request $request,$id){
        $category=Category::onlyTrashed()->forceDelete();
    
        return redirect()->route('all.category');


    }
}
