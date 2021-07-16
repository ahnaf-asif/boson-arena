<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'message' => ['required', 'max:1000'],
        ]);
    }
    public function index(){
        return view('contact');
    }
    public function sendMessage(Request $req){
        $this->validator($req->all())->validate();
        $new_contact = New Contact;

        $new_contact->subject = $req->subject;
        $new_contact->message = $req->message;


        if(isset($req->user_id)){
            $new_contact->user_id = $req->user_id;
            $new_contact->type = 'real';
        }
        $new_contact->anonymous_email = $req->email;
        $new_contact->anonymous_name = $req->name;

        $new_contact->save();
        return redirect()->route('contact')->with('success', 'Successfully sent a message. We will get back to you soon');
    }
}
