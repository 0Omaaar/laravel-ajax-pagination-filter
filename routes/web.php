<?php

use App\Http\Controllers\PaginationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaginationController::class, 'index']);
Route::get('/search', [PaginationController::class, 'search']);
