<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function products()
    {
        $games = collect(Game::all()); // Convert to a collection for proper filtering
        return view('products', compact('games'));
    }
    
}


