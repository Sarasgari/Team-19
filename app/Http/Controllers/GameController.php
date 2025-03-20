<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\File;

class GameController extends Controller
{
    public function products()
    {
        $games = collect(Game::all())->sortByDesc('id'); 
        return view('products', compact('games'));
    }
    
    public function show($id)
    {
        $game = Game::findOrFail($id);
        
        return view('GameDisplay', compact('game'));
    }

    public function create()
    {
        return view('admin.create-game');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'price' => 'required|numeric|min:0',
                'releasedate' => 'required|date',
                'stock' => 'required|integer|min:0',
                'platform' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

        
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('image'), $imageName);
            } else {
                $imageName = 'placeholder.jpg';
            }

        
            Game::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'price' => $validated['price'],
                'releasedate' => $validated['releasedate'],
                'stock' => $validated['stock'],
                'platform' => $validated['platform'],
                'image' => $imageName,
            ]);

            return redirect()->route('admin.products')->with('success', 'Game added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error adding game: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return view('admin.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        try {
            $game = Game::findOrFail($id);
            
            $validated = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'price' => 'required|numeric|min:0',
                'releasedate' => 'required|date',
                'stock' => 'required|integer|min:0',
                'platform' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            
            $game->title = $validated['title'];
            $game->description = $validated['description'];
            $game->price = $validated['price'];
            $game->releasedate = $validated['releasedate'];
            $game->stock = $validated['stock'];
            $game->platform = $validated['platform'];
            

            if ($request->hasFile('image')) {
                
                if ($game->image != 'placeholder.jpg' && File::exists(public_path('image/' . $game->image))) {
                    File::delete(public_path('image/' . $game->image));
                }
                
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('image'), $imageName);
                $game->image = $imageName;
            }
            
            $game->save();
            
            return redirect()->route('admin.products')->with('success', 'Game updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error updating game: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $game = Game::findOrFail($id);
            
            
            if ($game->image != 'placeholder.jpg' && File::exists(public_path('image/' . $game->image))) {
                File::delete(public_path('image/' . $game->image));
            }
            
            $game->delete();
            
            return redirect()->route('admin.products')->with('success', 'Game deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.products')->with('error', 'Error deleting game: ' . $e->getMessage());
        }
    }
}