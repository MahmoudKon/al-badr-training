<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'layouts.dashboard')->name('index');
Route::get('change/lang/{lang}', 'HomeController@changeLang')->name('change.lang');

// Route::view('/', 'layouts.dashboard');


Route::resource('users', 'UserController');

Route::resource('units', 'UnitController');

Route::resource('categories', 'CategoryController');

Route::resource('shops', 'ShopController');

Route::resource('clients', 'ClientsController');

Route::resource('stores', 'StoreController');

// Route::resource('items', 'ItemController');

Route::resource('items', 'ItemController');
Route::post('items/{item}/toggle/status', 'ItemController@toggleStatus')->name('items.toggle.status');
Route::post('items/multi-delete', 'ItemController@multiDelete')->name('items.multi-delete');

