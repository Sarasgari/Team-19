<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
    public function users()
    {
     $users = User::all();
     return view('admin.users')->with(['users'=> $users]); 
    }
    public function settings()
    {
         return view('admin.settings'); 
    }
}
