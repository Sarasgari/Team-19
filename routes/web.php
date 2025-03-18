<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
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

Route::get('/admin/users/{id}/profile', [UserController::class, 'showProfile'])->name('admin.users.profile');

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
Route::get('/', [PageController::class, 'home'])->name('home');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin'); 
    Route::get('admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    // Eyad Alsaher 230047989 
    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit'); // Get user details
    Route::get('/admin/users/{id}/profile/', [UserController::class, 'showProfile'])->name('admin.users.profile');
    Route::post('admin/users/{id}/update', [UserController::class, 'update'])->name('admin.users.update'); // Update user
    Route::delete('admin/users/{id}/delete', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('admin/settings', [SettingController::class, 'index'])->name('admin.settings');
    Route::post('admin/settings/update', [SettingController::class, 'update'])->name('admin.settings.update');
});
Route::get('/admin/messages', [ContactController::class, 'index'])->middleware('auth');


//basket commands
Route::post('cart/add/{games}',[BasketController::class, 'add'])->name('cart.add');
Route::post('cart/remove/{games}',[BasketController::class, 'remove'])->name('cart.remove');
Route::post('cart/update',[BasketController::class, 'update'])->name('cart.update');



Route::get('/game/{id}', [GameController::class, 'show'])->name('game.show');

// Cart Routes (Use CartController only)
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/basket', [CartController::class, 'viewCart'])->name('Basket');  // lowercase!
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

//admin product page
Route::get('/admin/games', [GameController::class, 'products'])->name('games.index');
Route::get('/admin/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/admin/games', [GameController::class, 'store'])->name('games.store');
Route::get('/admin/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/admin/games/{id}', [GameController::class, 'update'])->name('games.update');
Route::delete('/admin/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');