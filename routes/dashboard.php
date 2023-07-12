<?php

use Illuminate\Support\Facades\Route;

Route::view('dashboard', 'layouts.dashboard');



Route::resource('users', 'UserController')->except('show');