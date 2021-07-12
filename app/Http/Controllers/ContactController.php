<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }
    public function sendMessage(Request $req){
        $new_contact = New Contact;

        $new_contact->subject = $req->subject;
        $new_contact->message = $req->message;


        if(isset($req->user_id)){
            $new_contact->user_id = $req->user_id;
            $new_contact->type = 'real';
        }else{
            $new_contact->anonymous_email = $req->email;
            $new_contact->anonymous_name = $req->name;

        }
        $new_contact->save();
        return redirect()->route('contact')->with('success', 'Successfully sent a message. We will get back to you soon');
    }
}
