<?php

use App\Http\Controllers\PaginationController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaginationController::class, 'index']);
Route::get('/search', [PaginationController::class, 'search']);
Route::get('/products', [ProductController::class, 'index'])->name('products');
