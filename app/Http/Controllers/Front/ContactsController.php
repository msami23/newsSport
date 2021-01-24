<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
  /*  public function contact(){
        return view('front.contact');
    }

    public function sendContact(Request $request){
        $request->validate([
            'name'=>'string|min:5',
            'email'=>'email',
            'message'=>'required|string|min:10|max:500',
            'subject'=>'required|string|min:10|max:100',
        ]);
        $contact = new Contact();
       $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->message = $request->get('message');
        $contact->subject = $request->get('subject');
        $contact->save();
        $isSave = $contact->save();
        if($isSave){
            return view('front.home');
        }else{
            return view('front.contact');
        }

    }*/

    public function contact(){
        $contact = Contact::selection()->paginate(PAGINATION_COUNT);
        return view('front.contact', compact('contact'));
    }
    public function create()
    {

        return view('front.contact');

    }

    public function sendContact(ContactRequest $request){



        try {

        Contact::create([
            'message' => $request->message,
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
        ]);
        return redirect()->route('front.contact')->with(['success' => 'Save Successful!']);
        } catch (\Exception $ex) {


            return redirect()->route('front.contact')->with(['error' => 'Something went wrong please try again later']);


        }

    }

}
