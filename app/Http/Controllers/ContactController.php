<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function getContact(){
        return view('contact_main');
    }

    public function postContact(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'human' => 'required|in:5'
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'bodyMessage' => $request->message,
            'human' => $request->human
        );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to(config('siteconfig.contact_email'));
            $message->subject('CONTACT MAIL');
        });
        session()->flash('success', 'Your message has been sent successfully');
        return redirect()->back();
    }
}
