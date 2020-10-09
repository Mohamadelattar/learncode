<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\contact;

class ContactController extends Controller
{
    public function index() 
    {
    	return view("contact");
    }

    public function sendEmail(Request $request) {

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        Mail::to("mohamadelattar99@gmail.com")->send( new contact( $name, $email, $subject, $message));
        return response()->json(['message' => "Thank you for your email"]);
    }
}
