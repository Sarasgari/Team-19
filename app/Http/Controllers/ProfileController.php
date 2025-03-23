<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Review;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $reviews = Review::with('game')->where('user_id', $user->id)->get();

        return view('profile', compact('user', 'reviews'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        $user->name = $request->input('username');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('home')->with('success', 'Profile updated successfully!');
    }
}
