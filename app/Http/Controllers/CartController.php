<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // ✅ Added the missing Session import
use App\Models\Cart;
use App\Models\Game;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // ✅ View Cart (Supports Guests & Logged-in Users)
    public function viewCart()
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->with('game')->get();
        } else {
            $cart = Session::get('cart', []);
        }

        return view('basket', compact('cart'));
    }

    // ✅ Add Item to Cart (Supports Guests & Logged-in Users)
    public function addToCart(Request $request)
    {
        $game = Game::find($request->id);
        
        if (!$game || $game->stock <= 0) {
            return redirect()->back()->with('error', 'This game is out of stock!');
        }
        
        if (Auth::check()) {
            // Logged-in user: Save to database
            $cartItem = Cart::where('user_id', Auth::id())->where('game_id', $game->id)->first();
            
            if ($cartItem) {
                if ($cartItem->quantity < $game->stock) {
                    $cartItem->quantity++;
                    $cartItem->save();
                } else {
                    return redirect()->back()->with('error', 'Not enough stock available!');
                }
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'game_id' => $game->id,
                    'quantity' => 1,
                ]);
            }
        } else {
            // Guest user: Save to session
            $cart = Session::get('cart', []);
            if (isset($cart[$game->id])) {
                if ($cart[$game->id]['quantity'] < $game->stock) {
                    $cart[$game->id]['quantity']++;
                } else {
                    return redirect()->back()->with('error', 'Not enough stock available!');
                }
            } else {
                $cart[$game->id] = [
                    'title' => $game->title,
                    'price' => $game->price,
                    'quantity' => 1,
                ];
            }
            Session::put('cart', $cart);
        }
        
        // If the request has a 'redirect_to_basket' parameter, redirect to basket
        if ($request->has('redirect_to_basket')) {
            return redirect()->route('Basket')->with('success', 'Product added to cart successfully!');
        }
        
        // Otherwise redirect back to the previous page
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // ✅ Update Cart Quantity (Supports Guests & Logged-in Users)
    public function updateCart(Request $request)
    {
        if (Auth::check()) {
            // ✅ For logged-in users: Update cart in the database
            foreach ($request->quantities as $cartId => $quantity) {
                $cartItem = Cart::find($cartId);
                if ($cartItem) {
                    $game = Game::find($cartItem->game_id);
                    if ($game && $quantity <= $game->stock) {
                        $cartItem->quantity = $quantity;
                        $cartItem->save();
                    } else {
                        return redirect()->back()->with('error', 'Not enough stock available!');
                    }
                }
            }
        } else {
            // ✅ For guests: Update cart stored in session
            $cart = Session::get('cart', []);
    
            foreach ($request->quantities as $gameId => $quantity) {
                if (isset($cart[$gameId])) {
                    $game = Game::find($gameId); // ✅ Fetch the game from the database
                    if ($game && $quantity <= $game->stock) { // ✅ Corrected stock check
                        $cart[$gameId]['quantity'] = $quantity;
                    } else {
                        return redirect()->back()->with('error', 'Not enough stock available!');
                    }
                }
            }
    
            Session::put('cart', $cart);
        }
    
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
    

    //  Remove Item from Cart (Supports Guests & Logged-in Users)
    public function remove($id)
    {
        if (Auth::check()) {
            Cart::where('id', $id)->where('user_id', Auth::id())->delete();
        } else {
            $cart = Session::get('cart', []);
            if (isset($cart[$id])) {
                unset($cart[$id]);
                Session::put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    //  Clear Cart (Supports Guests & Logged-in Users)
    public function clearCart()
    {
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())->delete();
        } else {
            Session::forget('cart');
        }

        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }

    //  Checkout - Reduce Stock (Only for Logged-in Users)
    public function checkout()
    {
        if (!Auth::check()) {
            //  Process guest session cart
            $cart = Session::get('cart', []);
            if (empty($cart)) {
                return redirect()->back()->with('error', 'Your cart is empty!');
            }
    
            DB::beginTransaction();
            try {
                $totalAmount = 0; // Track total amount
    
                foreach ($cart as $gameId => $item) {
                    $game = Game::find($gameId);
                    if ($game && $game->stock >= $item['quantity']) {
                        $game->stock -= $item['quantity'];
                        $game->save();
                        $totalAmount += $game->price * $item['quantity']; // ✅ Calculate total
                    } else {
                        DB::rollBack();
                        return redirect()->back()->with('error', 'Not enough stock for some items.');
                    }
                }
    
                //  Clear guest cart after successful purchase
                Session::forget('cart');
                DB::commit();
    
                //  Pass cart items & total to PaymentForm
                return view('PaymentForm', ['cart' => $cart, 'totalAmount' => $totalAmount])
                       ->with('success', 'Purchase successful!');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Something went wrong. Please try again.');
            }
        }
    
        // Process checkout for logged-in users
        $cartItems = Cart::where('user_id', Auth::id())->with('game')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }
    
        DB::beginTransaction();
        try {
            $totalAmount = 0;
    
            foreach ($cartItems as $cartItem) {
                $game = Game::find($cartItem->game_id);
                if ($game && $game->stock >= $cartItem->quantity) {
                    $game->stock -= $cartItem->quantity;
                    $game->save();
                    $totalAmount += $game->price * $cartItem->quantity; // ✅ Calculate total
                } else {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Not enough stock for some items.');
                }
            }
    
            // ✅ Clear cart after purchase
            Cart::where('user_id', Auth::id())->delete();
            DB::commit();
    
            // ✅ Pass data to PaymentForm
            return view('PaymentForm', ['cart' => $cartItems, 'totalAmount' => $totalAmount])
                   ->with('success', 'Purchase successful!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    
}
