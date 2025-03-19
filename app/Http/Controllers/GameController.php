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

    public function create()
{
    return view('admin.create-game');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        'release_date' => 'required|date',
        'stock' => 'required|integer',
        'platforms' => 'required|array',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagePath = $request->file('image')->store('images', 'public');

    Game::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'price' => $validated['price'],
        'release_date' => $validated['release_date'],
        'stock' => $validated['stock'],
        'platforms' => json_encode($validated['platforms']),
        'image' => $imagePath,
    ]);

    return redirect()->route('games.index')->with('success', 'Game added successfully!');
}

public function destroy($id)
{
    $game = Game::findOrFail($id);
    $game->delete();

    return redirect()->route('games.index')->with('success', 'Game deleted successfully!');
}
}