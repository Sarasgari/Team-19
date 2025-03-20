<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        // Get cart items from session - these were set in CartController::checkout
        $cart = Session::get('checkout_cart', []);
        $totalAmount = Session::get('checkout_total', 0);
        
        if (empty($cart)) {
            return redirect()->route('Basket')->with('error', 'Your cart is empty');
        }
        
        try {
            // Create a new order
            $order = new Order();
            $order->user_id = Auth::check() ? Auth::id() : null;
            $order->customer_name = $request->input('name');
            $order->email = $request->input('email');
            $order->address = $request->input('address');
            $order->total_amount = $totalAmount;
            $order->status = 'completed';
            $order->save();
            
            // Create order items for each cart item
            foreach ($cart as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->game_id = $item['id'];
                $orderItem->game_name = $item['name'];
                $orderItem->price = $item['price'];
                $orderItem->quantity = $item['quantity'];
                $orderItem->save();
            }
            
            // Clear the cart
            if (Auth::check()) {
                Cart::where('user_id', Auth::id())->delete();
            } 
            Session::forget('cart');
            Session::forget('checkout_cart');
            Session::forget('checkout_total');
            
            // Store order ID in session to display on payment success page
            Session::put('last_order_id', $order->id);
            
            return redirect()->route('payment');
        } catch (\Exception $e) {
            Log::error('Error creating order: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was a problem processing your order. Please try again.');
        }
    }
    
    /**
     * Display orders in the admin interface.
     */
    public function showOrders()
    {
        // Get all orders with their items
        $orders = Order::with('items')->orderBy('created_at', 'desc')->get();
        
        // Get statistics for the dashboard
        $totalOrders = $orders->count();
        $completedOrders = $orders->where('status', 'completed')->count();
        $pendingOrders = $orders->where('status', 'pending')->count();
        $cancelledOrders = $orders->where('status', 'cancelled')->count();
        
        return view('admin.orders', compact('orders', 'totalOrders', 'completedOrders', 'pendingOrders', 'cancelledOrders'));
    }
    
    /**
     * Get the details of a specific order (for AJAX request).
     */
    public function getOrderDetails($id)
    {
        try {
            $order = Order::with('items')->findOrFail($id);
            return response()->json($order);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Order not found'], 404);
        }
    }
}