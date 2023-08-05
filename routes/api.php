<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
   
});

Route::middleware('auth:api')->group(function () {
    
    Route::apiResource('users',UserController::class );
    Route::apiResource('categories',CategoryController::class );
    Route::apiResource('units',UnitController::class );
    Route::apiResource('items',ItemController::class );
    Route::apiResource('shops',ShopController::class );
    Route::apiResource('stores',StoreController::class );
    Route::apiResource('clients',ClientsController::class );



});