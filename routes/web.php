<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;

// Home Route
Route::get('/', [PageController::class, 'home'])->name('home');

// Authentication Routes (IMPORTANT: Define Auth::routes() without the login route)
Auth::routes(['login' => false]); // Disable the default login route

// Custom Authentication Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginpost'])->name('loginpost');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Redirection After Login (After login route is defined)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/redirect', function () {
        if (Auth::user() && Auth::user()->is_admin) {
            return redirect('/admin');
        }
        return redirect('/home');
    })->name('admin.redirect');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/admin/messages', [ContactController::class, 'index'])->name('admin.messages');
});

// Public Pages
Route::get('/products', [GameController::class, 'products'])->name('products');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');
Route::get('/contactus', [PageController::class, 'contactus'])->name('contactus');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/paymentform', [PageController::class, 'paymentform'])->name('paymentform');
Route::get('/payment', [PageController::class, 'payment'])->name('payment');
Route::get('/game', [PageController::class, 'game'])->name('game');
Route::get('/game/{id}', [GameController::class, 'show'])->name('game.show');

// Cart Routes (Use CartController only)
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/basket', [CartController::class, 'viewCart'])->name('Basket');  // lowercase!
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');