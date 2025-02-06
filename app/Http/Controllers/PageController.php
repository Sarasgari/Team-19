<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function home(){
        return view('home');
    }


    public function products(){
        return view('products');
    }

    public function basket()
    {
        return view('basket');
    }

    public function aboutus()
    {
        return view('aboutus');
    }

    public function signup()
    {
        return view('signup');
    }

    public function register(Request $request)
    {

        
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        
        return redirect('/login')->with('success', 'Sign up, Succeed!');
    }
    
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login Succeed
            return redirect('/')->with('success', 'Login Succeed!');
        }

        // Login Failed
        return back()->withErrors(['email' => 'Email or Password is not correct.']);
    }
    
    public function logout()
    {
    Auth::logout();
    return redirect('/')->with('success', 'Loged out.');
    }

}
