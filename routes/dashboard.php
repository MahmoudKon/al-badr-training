<?php

use App\Http\Controllers\Dashboard\ShopController;
use Illuminate\Support\Facades\Route;

Route::view('', 'layouts.dashboard')->name('index');

Route::resource('shop', ShopController::class);
