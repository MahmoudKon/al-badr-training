<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'layouts.dashboard')->name('index');
Route::get('change/lang/{lang}', 'HomeController@changeLang')->name('change.lang');

Route::resource('users', 'UserController');
Route::post('users/multi-delete', 'UserController@multiDelete')->name('users.multi-delete');

Route::resource('units', 'UnitController');
Route::post('units/multi-delete', 'UnitController@multiDelete')->name('units.multi-delete');

Route::resource('categories', 'CategoryController');
Route::post('categories/{category}/toggle/status', 'CategoryController@toggleStatus')->name('categories.toggle.status');
Route::post('categories/multi-delete', 'CategoryController@multiDelete')->name('categories.multi-delete');


Route::controller('ShopController')->as('shop.')->prefix('shop')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::delete('/', 'destroy')->name('destroy');
});


Route::resource('clients', 'ClientController');
Route::post('clients/multi-delete', 'ClientController@multiDelete')->name('clients.multi-delete');


Route::resource('stores', 'StoreController');
Route::post('stores/multi-delete', 'StoreController@multiDelete')->name('stores.multi-delete');


Route::resource('items', 'ItemController');
Route::post('items/{item}/toggle/status', 'ItemController@toggleStatus')->name('items.toggle.status');
Route::post('items/multi-delete', 'ItemController@multiDelete')->name('items.multi-delete');


Route::resource('invoices', 'InvoiceController')->except('delete');
Route::get('invoices/items/list', 'InvoiceController@items')->name('invoices.items.list');
Route::get('invoices/items/details', 'InvoiceController@itemDetails')->name('invoices.items.details');


Route::get('print_settings', 'PrintSettingController@index')->name('print_settings.index');
Route::post('print_settings', 'PrintSettingController@update')->name('print_settings.update');
Route::get('print_settings/print', 'PrintSettingController@print')->name('print_settings.print');



Route::get('report', 'ReportController@index')->name('report.index');
