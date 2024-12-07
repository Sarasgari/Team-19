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

Route::get('/PaymentForm', function () {
    return view('PaymentForm');
    });
    
