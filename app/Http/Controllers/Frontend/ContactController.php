<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
USE App\Models\Contact;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('frontend.Contact');
    }

    public function ContactStore(Request $request)
    {
          Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'city' => $request->input('city'),
            'message' => $request->input('message'),
            'phone'  => $request->input('phone'),
        ]);
        return redirect()->route('contactf')->with('success','Your message has been sent successfully!');

    }
}
