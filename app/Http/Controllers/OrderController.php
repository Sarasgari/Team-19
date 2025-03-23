<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Game;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the user's orders
     */
    public function index()
    {
        // Get all orders for the current user
        $orders = Order::where('user_id', Auth::id())
            ->with(['items.game'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('order', compact('orders'));  // Using 'order' to match your file name
    }

    /**
     * Store a newly created order in storage from cart items
     */
    public function store(Request $request)
    {
        // Validate payment method
        $request->validate([
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer'
        ]);
        
        // Start a database transaction
        return DB::transaction(function () use ($request) {
            $user = Auth::user();
            
            // Get cart items for the current user
            $cartItems = Cart::where('user_id', $user->id)->get();
            
            if ($cartItems->isEmpty()) {
                return redirect()->route('Basket')->with('error', 'Your cart is empty');
            }
            
            // Calculate total amount
            $totalAmount = 0;
            
            foreach ($cartItems as $item) {
                $game = Game::find($item->product_id);
                if (!$game) {
                    continue;
                }
                $totalAmount += $game->price * $item->quantity;
            }
            
            // Create a new order
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'payment_method' => $request->payment_method,
            ]);
            
            // Create order items from cart
            foreach ($cartItems as $item) {
                $game = Game::find($item->product_id);
                if (!$game) {
                    continue;
                }
                
                OrderItem::create([
                    'order_id' => $order->id,
                    'game_id' => $game->id,
                    'quantity' => $item->quantity,
                    'price' => $game->price,
                ]);
                
                // Update game stock
                $game->stock -= $item->quantity;
                $game->save();
            }
            
            // Clear the cart
            Cart::where('user_id', $user->id)->delete();
            
            // Redirect directly to the orders index page
            return redirect()->route('orders.index')
                ->with('success', 'Order #' . $order->id . ' placed successfully!');
        });
    }

    /**
     * Display the specified order - now just redirects to the index
     */
    public function show(Order $order)
    {
        // Security check
        if ($order->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }
        
        // Redirect to orders page with a success message
        return redirect()->route('orders.index')
                        ->with('success', 'Order #' . $order->id . ' was placed successfully!');
    }
    
    /**
     * Process checkout and show payment form
     */
    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('game')->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('Basket')->with('error', 'Your cart is empty');
        }
        
        // Calculate total amount
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $game = Game::find($item->product_id);
            if ($game) {
                $totalAmount += $game->price * $item->quantity;
            }
        }
        
        return view('PaymentForm', compact('cartItems', 'totalAmount'));
    }
}