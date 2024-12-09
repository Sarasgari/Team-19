<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    // Display the cart
    public function index()
    {
        $basket = session()->get('basket', []);
        return view('Basket', compact(''));
    }

    // Add a product to the cart
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        // If the product already exists in the cart, increase the quantity
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            // If the product does not exist in the cart, add it
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        // Save the updated cart to the session
        session()->put('cart', $cart);

        return redirect()->route('Basket');
    }

    // Remove a product from the cart
    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);

        return redirect()->route('Basket');
    }

    // Update the cart (e.g., for changing quantities)
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        
        foreach ($request->quantities as $productId => $quantity) {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('Basket');
    }
}

