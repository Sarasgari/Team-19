<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;

// Homepage
Route::get('/', [PageController::class, 'home'])->name('home');

// Authentication routes (still available for users who want accounts)
Auth::routes();
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginpost'])->name('loginpost');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Pages (Accessible by Everyone)
Route::get('/products', [GameController::class, 'products'])->name('products');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');
Route::get('/contactus', [PageController::class, 'contactus'])->name('contactus');
Route::get('/paymentform', [PageController::class, 'paymentform'])->name('paymentform');
Route::get('/payment', [PageController::class, 'payment'])->name('payment');
Route::get('/game', [PageController::class, 'game'])->name('game');
Route::get('/admin', [PageController::class, 'admin'])->name('admin');

// **Allow Guests & Logged-in Users to Use Cart**
Route::get('/basket', [CartController::class, 'viewCart'])->name('Basket'); // 🔹 Fixed case
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// **Checkout Route (If Checkout Exists)**
//Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout'); 
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


