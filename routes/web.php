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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/signup', [PageController::class, 'signup']);
Route::post('/signup', [PageController::class, 'register']);

Route::get('/login', [PageController::class, 'login']);
Route::post('/login', [PageController::class, 'authenticate']);

Route::get('/logout', [PageController::class, 'logout']);