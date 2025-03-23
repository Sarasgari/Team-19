<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ReviewController;

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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Pages
Route::get('/products', [GameController::class, 'products'])->name('products');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');
Route::get('/contactus', [PageController::class, 'contactus'])->name('contactus');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/game/{id}', [GameController::class, 'show'])->name('game.show');

// Cart Routes (Use CartController only)
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/basket', [CartController::class, 'viewCart'])->name('Basket');  // lowercase!

// Password Reset Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Review Controller - Only keep the store route, products route is handled by GameController
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
// REMOVED duplicate route: Route::get('/products', [ReviewController::class, 'index'])->name('products');

// Payment Processing (if not using orders system)
Route::post('/payment', [PageController::class, 'processPayment'])->name('payment.process');
Route::get('/payment', [PageController::class, 'payment'])->name('payment');
Route::get('/paymentform', [PageController::class, 'paymentform'])->name('paymentform');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Admin redirection
    Route::get('/admin/redirect', function () {
        if (Auth::user() && Auth::user()->is_admin) {
            return redirect('/admin');
        }
        return redirect('/home');
    })->name('admin.redirect');
    
    // User profile
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    
    // Order routes for regular users
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    
    // Admin Products
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/games', [GameController::class, 'products'])->name('games.index');
    Route::get('/admin/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/admin/games', [GameController::class, 'store'])->name('games.store');
    Route::get('/admin/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::put('/admin/games/{id}', [GameController::class, 'update'])->name('games.update');
    Route::delete('/admin/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');
    
    // Admin Orders
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/admin/orders/{id}/details', [AdminController::class, 'getOrderDetails'])->name('admin.orders.details');
    Route::put('/admin/orders/{id}/update-status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.update-status');
    
    // Admin Users
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::get('/admin/users/{id}/profile', [UserController::class, 'showProfile'])->name('admin.users.profile');
    Route::post('/admin/users/{id}/update', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}/delete', [UserController::class, 'destroy'])->name('admin.users.destroy');
    
    // Admin Settings and Messages
    Route::get('/admin/settings', [SettingController::class, 'index'])->name('admin.settings');
    Route::post('/admin/settings/update', [SettingController::class, 'update'])->name('admin.settings.update');
    Route::get('/admin/messages', [ContactController::class, 'index'])->name('admin.messages');
});