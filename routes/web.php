<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


//URLs
Route::get('/', function () {
    return view('home');
});


//in page
Route::get('/products', [PageController::class, 'products'])->name('products');

Route::get('/basket', [PageController::class, 'basket'])->name('Basket');

Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');

Route::get('/contactus', [PageController::class, 'contactus'])->name('contactus');

Route::get('/signup', [PageController::class, 'signup'])->name('signup');

Route::get('/login', [PageController::class, 'login'])->name('login');

Route::get('/home', [PageController::class, 'home'])->name('home');

Route::get('/paymentform', [PageController::class, 'paymentform'])->name('paymentform');

Route::get('/payment', [PageController::class, 'payment'])->name('payment');

Route::get('/game', [PageController::class, 'game'])->name('game');



    
