<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game; // Import the Game model
use App\Models\User;
use App\Models\Order; 

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin'); 
    }

    public function products()
    {
        $games = collect(Game::all()); // Retrieve all games
        return view('admin.Product', compact('games')); // Pass the games variable to the view
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


public function getOrderDetails($id)
{
    $order = Order::with(['user', 'items.game'])
                 ->findOrFail($id);
                 
    return response()->json($order);
}


public function updateOrderStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,processing,completed,cancelled'
    ]);
    
    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();
    
    return redirect()->route('admin.orders')
                    ->with('success', "Order #{$id} status updated to {$request->status}");
}
}
