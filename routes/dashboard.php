<?php

use Illuminate\Support\Facades\Route;


//  Route::get('/', function () {
//     return view('auth.login') ;
// });

// Route::prefix('admin')->group(function () {
//   Route::view('/', 'layouts.dashboard')->name('index');

   
//   });
 


Route::view('/', 'layouts.dashboard')->name('index');

Route::resource('users', 'UserController');
Route::post('users/multi-delete', 'UserController@multiDelete')->name('users.multi-delete');

Route::resource('units', 'UnitController');
Route::post('units/multi-delete', 'UnitController@multiDelete')->name('units.multi-delete');

Route::resource('categories', 'CategoryController');
Route::post('categories/{category}/toggle/status', 'CategoryController@toggleStatus')->name('categories.toggle.status');
Route::post('categories/multi-delete', 'CategoryController@multiDelete')->name('categories.multi-delete');
Route::get('categories/list/parents', 'CategoryController@parents')->name('categories.parents');

Route::resource('clients', 'ClientsController');
Route::post('clients/multi-delete', 'ClientsController@multiDelete')->name('clients.multi-delete');

Route::controller('ShopController')->as('shop.')->prefix('shop')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::delete('/', 'destroy')->name('destroy');
});

Route::resource('stores', 'storesController');
Route::post('stores/multi-delete', 'storesController@multiDelete')->name('stores.multi-delete');