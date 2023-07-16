<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'layouts.dashboard');


Route::resource('users', 'UserController');

Route::resource('units', 'UnitController');

Route::resource('categories', 'CategoryController');

Route::resource('shops', 'ShopController');

