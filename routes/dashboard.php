<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ShopController;
use App\Http\Controllers\Dashboard\UnitController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;

Route::view('', 'layouts.dashboard')->name('index');

Route::resource('shops', ShopController::class);
Route::resource('users', UserController::class);
Route::resource('units', UnitController::class);
Route::resource('categories', CategoryController::class);
