<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Game;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // View Cart (Supports Guests & Logged-in Users)
    public function viewCart()
    {
        if (Auth::check()) {
            // Make sure to include the game relationship
            $cart = Cart::where('user_id', Auth::id())->get();
            
            // Load the game for each cart item (since product_id points to games)
            foreach ($cart as $item) {
                $item->game = Game::find($item->product_id);
            }
        } else {
            $cart = Session::get('cart', []);
        }

        return view('basket', compact('cart'));
    }

    // Add Item to Cart (Supports Guests & Logged-in Users)
    public function addToCart(Request $request)
    {
        \Log::info('Add to cart request received: ' . json_encode($request->all()));
        
        $gameId = $request->id;
        $game = Game::find($gameId);
        
        if (!$game) {
            \Log::error('Game not found: ' . $gameId);
            return redirect()->back()->with('error', 'Game not found!');
        }
        
        if ($game->stock <= 0) {
            \Log::error('Game out of stock: ' . $game->title);
            return redirect()->back()->with('error', 'This game is out of stock!');
        }
        
        \Log::info('Game found: ' . $game->title . ', Stock: ' . $game->stock);
        
        if (Auth::check()) {
            \Log::info('User is authenticated: ' . Auth::id());
            
            // Logged-in user: Save to database
            try {
                // Check for existing cart item
                $cartItem = Cart::where('user_id', Auth::id())
                            ->where('product_id', $gameId)
                            ->first();
                
                \Log::info('Existing cart item: ' . ($cartItem ? 'Yes, ID=' . $cartItem->id : 'No'));
                
                if ($cartItem) {
                    // Update existing item
                    if ($cartItem->quantity < $game->stock) {
                        $cartItem->quantity++;
                        $cartItem->total = $cartItem->quantity * $game->price;
                        $cartItem->save();
                        \Log::info('Updated cart item: Qty=' . $cartItem->quantity . ', Total=' . $cartItem->total);
                    } else {
                        \Log::error('Not enough stock available');
                        return redirect()->back()->with('error', 'Not enough stock available!');
                    }
                } else {
                    // Create new cart item
                    try {
                        $newCartItem = new Cart();
                        $newCartItem->user_id = Auth::id();
                        $newCartItem->product_id = $gameId;
                        $newCartItem->quantity = 1;
                        $newCartItem->total = $game->price;
                        $newCartItem->save();
                        
                        \Log::info('Created new cart item: ID=' . $newCartItem->id);
                    } catch (\Exception $e) {
                        \Log::error('Error creating cart item: ' . $e->getMessage());
                        \Log::error($e->getTraceAsString());
                        return redirect()->back()->with('error', 'Error adding to cart. Please try again.');
                    }
                }
            } catch (\Exception $e) {
                \Log::error('Error in addToCart: ' . $e->getMessage());
                \Log::error($e->getTraceAsString());
                return redirect()->back()->with('error', 'Error adding to cart. Please try again.');
            }
        } else {
            \Log::info('User is guest, adding to session');
            
            // Guest user: Save to session
            $cart = Session::get('cart', []);
            if (isset($cart[$gameId])) {
                if ($cart[$gameId]['quantity'] < $game->stock) {
                    $cart[$gameId]['quantity']++;
                    $cart[$gameId]['total'] = $cart[$gameId]['quantity'] * $game->price;
                    \Log::info('Updated session cart item: Qty=' . $cart[$gameId]['quantity']);
                } else {
                    \Log::error('Not enough stock available for session cart');
                    return redirect()->back()->with('error', 'Not enough stock available!');
                }
            } else {
                $cart[$gameId] = [
                    'title' => $game->title,
                    'price' => $game->price,
                    'quantity' => 1,
                    'total' => $game->price
                ];
                \Log::info('Added new item to session cart: ' . $game->title);
            }
            Session::put('cart', $cart);
        }
        
        // If the request has a 'redirect_to_basket' parameter, redirect to basket
        if ($request->has('redirect_to_basket')) {
            \Log::info('Redirecting to basket');
            return redirect()->route('Basket')->with('success', 'Product added to cart successfully!');
        }
        
        // Otherwise redirect back to the previous page
        \Log::info('Redirecting back to previous page');
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    // Update Cart Quantity (Supports Guests & Logged-in Users)
    public function updateCart(Request $request)
    {
        if (Auth::check()) {
            // For logged-in users: Update cart in the database
            foreach ($request->quantities as $cartId => $quantity) {
                $cartItem = Cart::find($cartId);
                if ($cartItem) {
                    $game = Game::find($cartItem->product_id);  // Using product_id to match your schema
                    if ($game && $quantity <= $game->stock) {
                        $cartItem->quantity = $quantity;
                        $cartItem->total = $quantity * $game->price; // Update total
                        $cartItem->save();
                    } else {
                        return redirect()->back()->with('error', 'Not enough stock available!');
                    }
                }
            }
        } else {
            // For guests: Update cart stored in session
            $cart = Session::get('cart', []);
    
            foreach ($request->quantities as $gameId => $quantity) {
                if (isset($cart[$gameId])) {
                    $game = Game::find($gameId);
                    if ($game && $quantity <= $game->stock) {
                        $cart[$gameId]['quantity'] = $quantity;
                        $cart[$gameId]['total'] = $quantity * $game->price; // Update total
                    } else {
                        return redirect()->back()->with('error', 'Not enough stock available!');
                    }
                }
            }
    
            Session::put('cart', $cart);
        }
    
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
    
    // Remove Item from Cart (Supports Guests & Logged-in Users)
    public function remove(Request $request, $id)
    {
        \Log::info('Remove cart item called with id: ' . $id);
        
        if (Auth::check()) {
            // For logged-in users: Remove from database
            $deleted = Cart::where('id', $id)
                      ->where('user_id', Auth::id())
                      ->delete();
            
            \Log::info('Deleted cart item from database: ' . ($deleted ? 'yes' : 'no'));
        } else {
            // For guests: Remove from session
            $cart = Session::get('cart', []);
            
            \Log::info('Current cart keys: ' . implode(', ', array_keys($cart)));
            
            if (isset($cart[$id])) {
                unset($cart[$id]);
                Session::put('cart', $cart);
                \Log::info('Removed cart item from session with key: ' . $id);
            } else {
                \Log::info('Cart item with key ' . $id . ' not found in session');
            }
        }

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    // Clear Cart (Supports Guests & Logged-in Users)
    public function clearCart()
    {
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())->delete();
        } else {
            Session::forget('cart');
        }

        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }

    // Checkout - Reduce Stock and Create Order
    public function checkout()
    {
        // Only allow logged-in users to checkout
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to complete your purchase.');
        }
    
        // Process checkout for logged-in users
        $cartItems = Cart::where('user_id', Auth::id())->get();
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }
    
        // Add this debugging
        \Log::info('Starting checkout process');
        \Log::info('Cart items:', $cartItems->toArray());
    
        DB::beginTransaction();
        try {
            $totalAmount = 0;
            $orderItems = [];
    
            foreach ($cartItems as $cartItem) {
                $game = Game::find($cartItem->product_id);
                
                // Add this debugging
                \Log::info('Processing game:', ['id' => $cartItem->product_id, 'found' => $game ? 'yes' : 'no']);
                
                if ($game && $game->stock >= $cartItem->quantity) {
                    $game->stock -= $cartItem->quantity;
                    $game->save();
                    
                    $itemTotal = $game->price * $cartItem->quantity;
                    $totalAmount += $itemTotal;
                    
                    // Store order item details for later use
                    $orderItems[] = [
                        'game_id' => $game->id,
                        'game_title' => $game->title,
                        'quantity' => $cartItem->quantity,
                        'price' => $game->price,
                        'subtotal' => $itemTotal
                    ];
                    
                    // Debug each item as it's added
                    \Log::info('Added order item:', end($orderItems));
                } else {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Not enough stock for some items.');
                }
            }
    
            // Debug before order creation
            \Log::info('About to create order with total:', ['total' => $totalAmount]);
            
            // Create a new order record
            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => $totalAmount,
                'status' => 'pending'
            ]);
            
            // Debug after order creation
            \Log::info('Created order:', ['order_id' => $order->id]);
            
            // Create order items records
            foreach ($orderItems as $item) {
                // Debug each item before creating
                \Log::info('Creating order item:', $item);
                
                OrderItem::create([
                    'order_id' => $order->id,
                    'game_id' => $item['game_id'],
                    'game_title' => $item['game_title'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['subtotal']
                ]);
            }
    
            // Clear cart after purchase
            Cart::where('user_id', Auth::id())->delete();
            DB::commit();
    
            // Pass data to PaymentForm
            return view('PaymentForm', [
                'cart' => $cartItems, 
                'totalAmount' => $totalAmount,
                'order_id' => $order->id
            ])->with('success', 'Purchase successful!');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Checkout error: ' . $e->getMessage());
            \Log::error('Checkout error trace: ' . $e->getTraceAsString());
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}