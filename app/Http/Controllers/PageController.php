<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function signup(){
        return view('signup');
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

    public function contactus()
    {
        return view('contactus'); 
    }

    public function paymentform()
    {
        return view('PaymentForm'); 
    }

    public function payment()
    {
        return view('payment'); 
    }

    public function game()
    {
        return view('game'); 
    }

}

