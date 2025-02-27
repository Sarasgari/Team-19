<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    // View Cart Page
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('basket', compact('cart'));
    }

    // Add Item to Cart
    public function addToCart(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $price = $request->price;

        $cart = session()->get('cart', []);

        // Check if item exists in cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $name,
                'price' => $price,
                'quantity' => 1
            ];
        }

        // Save to session
        session()->put('cart', $cart);
        Log::info("Cart after adding: " . print_r(session()->get('cart'), true));

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Update Cart
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->quantities as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);
        Log::info("Cart after update: " . print_r(session()->get('cart'), true));

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    // Remove Item from Cart
    public function remove($id)
    {
        // Get the cart from session
        $cart = session()->get('cart', []);
    
        // Check if the item exists
        if (isset($cart[$id])) {
            unset($cart[$id]); // Remove the item
            session()->put('cart', $cart); // Update session
        }
    
        return redirect()->back()->with('success', 'Item removed from cart.');
    }
    
    // Clear Cart
    public function clearCart()
    {
        session()->forget('cart');
        Log::info("Cart cleared successfully!");

        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }
}
