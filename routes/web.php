<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

//URLs
Route::get('/', function () {
    return view('home');
});

Auth::routes();

//in page
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/basket', [PageController::class, 'basket'])->name('Basket');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');

Route::get('/contactus', [PageController::class, 'contactus'])->name('contactus');

Route::get('/signup', [PageController::class, 'signup'])->name('signup');

Route::get('/login', [PageController::class, 'login'])->name('login');

Route::get('/paymentform', [PageController::class, 'paymentform'])->name('paymentform');

Route::get('/payment', [PageController::class, 'payment'])->name('payment');

Route::get('/game', [PageController::class, 'game'])->name('game');
Route::get('/', [PageController::class, 'home'])->name('home');

//basket commands
Route::post('cart/add/{games}',[BasketController::class, 'add'])->name('cart.add');
Route::post('cart/remove/{games}',[BasketController::class, 'remove'])->name('cart.remove');
Route::post('cart/update',[BasketController::class, 'update'])->name('cart.update');


Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/basket', [CartController::class, 'viewCart'])->name('Basket');
Route::post('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');

