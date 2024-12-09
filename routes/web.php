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

//in page
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/basket', [PageController::class, 'basket'])->name('Basket');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');
Route::get('/', [PageController::class, 'home'])->name('home');

//basket commands
Route::post('cart/add/{games}',[BasketController::class, 'add'])->name('cart.add');
Route::post('cart/remove/{games}',[BasketController::class, 'remove'])->name('cart.remove');
Route::post('cart/update',[BasketController::class, 'update'])->name('cart.update');
