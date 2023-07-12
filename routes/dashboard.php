<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'layouts.dashboard');


Route::resource('users', 'UserController');
