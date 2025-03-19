<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:5'
        ]);

        
        $contactData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($contactData));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
