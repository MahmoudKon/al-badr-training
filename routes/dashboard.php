<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::view('/', 'layouts.dashboard');


Route::resource('users', 'UserController');
