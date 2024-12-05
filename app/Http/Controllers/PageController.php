<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
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
