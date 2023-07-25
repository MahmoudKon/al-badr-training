<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'auth:web'], function($route){

    Route::view('/', 'layouts.dashboard')->name('index');

    Route::resource('users', 'UserController')->middleware('IfAuthrized');
    Route::post('users/multi-delete', 'UserController@multiDelete')->name('users.multi-delete');

    Route::resource('units', 'UnitController');
    Route::post('units/multi-delete', 'UnitController@multiDelete')->name('units.multi-delete');

    Route::get('categories/sub-category', 'CategoryController@subCategory')->name('categories.sub-categories');
    Route::resource('categories', 'CategoryController')->middleware('can:categories');
    Route::post('categories/{category}/toggle/status', 'CategoryController@toggleStatus')->name('categories.toggle.status');
    Route::post('categories/multi-delete', 'CategoryController@multiDelete')->name('categories.multi-delete');


    Route::resource('stores', 'StoreController');
    Route::post('p/multi-del', 'StoreController@multi')->name('stores.multi-delete');
    Route::resource('roles', 'RoleController');
    Route::post('multi-del', 'RoleController@multi')->name('roles.multi-delete');



    Route::controller('ShopController')->as('shop.')->prefix('shop')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::delete('/', 'destroy')->name('destroy');
    });

}); // routegroup
