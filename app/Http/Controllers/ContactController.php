<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contacts;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    public function sendMessage(Contacts $request)
    {
        $input = $request->except('_token');
        $input['ip'] = $request->ip();

        $contact = Contact::create($input);

        Mail::to($request->email)->send(new ContactMail($contact));

        return redirect()->back()->with('success_message', 'Your rating has been sent!');
    }
}
