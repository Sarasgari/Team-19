<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin'); 
    }

    public function products()
    {
         return view('admin.products'); 
    }

    public function orders()
    {
         return view('admin.orders'); 
    }
}
