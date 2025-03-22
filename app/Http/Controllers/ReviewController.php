<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'review_text' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'review_text' => $request->review_text,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    public function index()
    {
        $games = Game::all(); 
        $reviews = Review::latest()->paginate(5);

      
        return view('products', compact('reviews', 'games'));
    }
}
