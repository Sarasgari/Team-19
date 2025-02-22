<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AuthController;


//URLs
Route::get('/', function () {
    return view('home');
});

Auth::routes();

//login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginpost'])->name('loginpost');

//signup
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'registerPost'])->name('registerPost');

//logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//in page
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/basket', [PageController::class, 'basket'])->name('Basket');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');

Route::get('/contactus', [PageController::class, 'contactus'])->name('contactus');

Route::get('/paymentform', [PageController::class, 'paymentform'])->name('paymentform');

Route::get('/payment', [PageController::class, 'payment'])->name('payment');

Route::get('/game', [PageController::class, 'game'])->name('game');
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/admin', [PageController::class, 'admin'])->name('admin');

//basket commands
Route::post('cart/add/{games}',[BasketController::class, 'add'])->name('cart.add');
Route::post('cart/remove/{games}',[BasketController::class, 'remove'])->name('cart.remove');
Route::post('cart/update',[BasketController::class, 'update'])->name('cart.update');
