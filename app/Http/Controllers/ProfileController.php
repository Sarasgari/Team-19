<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

class ProfileController extends Controller
{
    public function showProfile()
{
    $user = Auth::user();
    $orders = $user->orders()->get();

    return view('profile', compact('user', 'orders'));
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
