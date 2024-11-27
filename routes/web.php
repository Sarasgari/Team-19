<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


//URLs
Route::get('/', function () {
    return view('home');
});

Route::get('/games', function(){
    return view('products');
});

//in page
Route::get('/producs', [PageController::class, 'products'])->name('products');