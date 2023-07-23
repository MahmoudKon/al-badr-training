<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ShopController;
use App\Http\Controllers\Dashboard\UnitController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ClientsController;
use App\Http\Controllers\Dashboard\ItemsController;
use App\Http\Controllers\Dashboard\StoresController;

Route::view('', 'layouts.dashboard')->name('index');

Route::resource('users', UserController::class);
Route::post('users/multi-delete', [UserController::class, 'multiDelete'])->name('users.multi-delete');

Route::resource('units', UnitController::class);
Route::post('units/multi-delete', [UnitController::class, 'multiDelete'])->name('units.multi-delete');

Route::resource('categories', CategoryController::class);
Route::get('categories/parent', [CategoryController::class, 'show'])->name('category.parent');
Route::post('categories/multi-delete', [CategoryController::class, 'multiDelete'])->name('categories.multi-delete');
// Route::get('categories/list/parents', [CategoryController::class, 'parents'])->name('categories.parents');

Route::resource('clients', ClientsController::class);
Route::post('clients/multi-delete', [ClientsController::class, 'multiDelete'])->name('clients.multi-delete');

Route::resource('stores', StoresController::class);
Route::post('stores/multi-delete', [StoresController::class, 'multiDelete'])->name('stores.multi-delete');

Route::resource('items', ItemsController::class);
Route::post('items/multi-delete', [ItemsController::class, 'multiDelete'])->name('items.multi-delete');
// Route::controller('ShopController')->as('shop.')->prefix('shop')->group(function () {
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::post('/shop', [ShopController::class, 'store'])->name('store');
Route::delete('/shop', [ShopController::class, 'destroy'])->name('destroy');
// });
