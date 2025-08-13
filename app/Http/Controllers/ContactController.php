<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function Contact(){
        $contacts = Contact::all();
        return view('contact.view_contact', compact('contacts'));
    }

    public function ContactDestroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contact')->with('success','Contact deleted successfully');
    }
}
