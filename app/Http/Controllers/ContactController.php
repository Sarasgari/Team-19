<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Save to database
        Message::create($request->all()); // ✅ Uses mass assignment

        // Redirect back with success message
        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function index()
    {
        $messages = Message::latest()->get();
        return view('admin.messages', compact('messages'));
    }
}
