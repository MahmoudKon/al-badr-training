<?php

use Illuminate\Support\Facades\Route;
// use APP\Http\Controllers\Dashboard\UserController;
// use APP\Http\Controllers\Dashboard\UnitController;
// use APP\Http\Controllers\Dashboard\categoriesController;


Route::view('/', 'layouts.dashboard');


Route::resource('users', 'UserController');

Route::resource('units', 'UnitController'); 

 Route::resource('categories', 'categoriesController');