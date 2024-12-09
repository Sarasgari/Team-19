<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function signup(){
        return view('signup');
    }
    
    public function signin(){
        return view('login');
    }

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
}
