<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multipic;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\ContactForm;

use Illuminate\Support\Carbon;




class HeaderController extends Controller
{
    public function portfolio(){

        $images=Multipic::all();

        return view('pages.portfolio',['images'=>$images]);
    }

    public function admincontact(){
        $contacts=Contact::all();
        return view('admin.contact.index',['contacts'=>$contacts]);



    }

    public function adminaddcontact(){

        return view('admin.contact.create');
    }

    public function storeadmincontact(Request $request){
        
        Contact::insert([
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone,
            
            'created_at'=>Carbon::now(),
        


        ]);
            return redirect()->route('admin.contact')->with('success','Admin Contact Detail inserted successfully');
        }

        public function admincontactedit($id){

            $contact=Contact::find($id);
            return view('admin.contact.edit',['contact'=>$contact]);
        }

        public function admincontactupdate(Request $request,$id){

            Contact::find($id)->update([
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'created_at'=>Carbon::now(),
    
    
            ]);
                return redirect()->route('admin.contact')->with('success','Admin Contact Detail updated successfully');
       
        }

        public function admincontactdelete($id){
            Contact::find($id)->delete();
            return redirect()->route('admin.contact')->with('success','Contact deleted successfully');
        }

        public function homecontact(){
            $contacts=Contact::all()->first();
            return view('pages.contact',['contacts'=>$contacts]);
        }

        public function contactform(Request $request){

            ContactForm::insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'subject'=>$request->subject,
                'message'=>$request->message,
                'created_at'=>Carbon::now(),
            
    
    
            ]);
                return redirect()->route('contact')->with('success','Message Sent successfully');
            }

            public function adminmessage(){
                $messages=ContactForm::all();
                return view('admin.contact.message',['messages'=>$messages]);
            }

            public function adminmessagedelete($id){
                ContactForm::find($id)->delete();
            return redirect()->route('admin.message')->with('success','Message deleted successfully');


            }


        

    
}
