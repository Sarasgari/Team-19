<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function products()
    {
        $games = collect(Game::all()); 
        return view('products', compact('games'));
    }
    
    public function show($id)
    {
        $game = Game::findOrFail($id);
        
        if (!$game) {
            return redirect()->route('products')->with('error', 'Game not found!');
        }
        
        return view('GameDisplay', compact('game'));
    }
}