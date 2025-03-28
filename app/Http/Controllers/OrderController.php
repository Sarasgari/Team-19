<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of all orders for admin.
     *
     * @return \Illuminate\Http\Response
     */


     public function processOrder(Request $request)
     {
         if ($request->has('order_id')) {
             $order = Order::find($request->order_id);
             if ($order) {
                 // Update order status or other information as needed
                 $order->status = 'processing'; // or 'completed'
                 $order->save();
                 
                 return response()->json(['success' => true]);
             }
         }
         
         return response()->json(['success' => false], 400);
     }

    public function index()
    {
        // Get all orders with user information
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        
        // Calculate order statistics
        $totalOrders = $orders->count();
        $completedOrders = $orders->where('status', 'completed')->count();
        $pendingOrders = $orders->where('status', 'pending')->count();
        $cancelledOrders = $orders->where('status', 'cancelled')->count();
        
        // Calculate total revenue
        $totalRevenue = $orders->sum('total');
        
        return view('admin.orders', compact(
            'orders', 
            'totalOrders', 
            'completedOrders', 
            'pendingOrders', 
            'cancelledOrders',
            'totalRevenue'
        ));
    }
    
    /**
     * Show the details for a specific order.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Load order with user and items and their games
        $order = Order::with(['user', 'items.game'])->findOrFail($id);
        
        $orderDetails = [
            'id' => $order->id,
            'user' => $order->user ? [
                'name' => $order->user->name,
                'email' => $order->user->email
            ] : null,
            'total' => $order->total,
            'status' => $order->status,
            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
            'items' => $order->items->map(function($item) {
                return [
                    'game_title' => $item->game->title,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total' => $item->total
                ];
            })
        ];
        
        return response()->json($orderDetails);
    }
    
    /**
     * Update the status of an order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);
        
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        
        return response()->json(['success' => 'Order status updated successfully']);
    }
    
    /**
     * Get order statistics for admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrderStats()
    {
        $orders = Order::all();
        
        $stats = [
            'total' => $orders->count(),
            'completed' => $orders->where('status', 'completed')->count(),
            'pending' => $orders->where('status', 'pending')->count(),
            'cancelled' => $orders->where('status', 'cancelled')->count(),
            'revenue' => $orders->sum('total')
        ];
        
        return response()->json($stats);
    }
    
}