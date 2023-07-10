<?php

use App\Http\Controllers\Dashboard\ShopController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::view('', 'layouts.dashboard')->name('index');

Route::resource('shops', ShopController::class);
Route::resource('users', UserController::class);
