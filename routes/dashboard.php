<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::view('dashboard', 'layouts.dashboard');
Route::get('/user', [UserController::class,'index']);
Route::get('/edit/{id}', [UserController::class,'edit'])->name("edit-user");
Route::get('/delete/{id}', [UserController::class,'destoy'])->name("delete-user");
Route::post('update-user/{id}',[UserController::class,'updateUser'])->name('update-user');
Route::get('/all-users',[UserController::class,'showUsers'])->name('all-users');
Route::get('/create',[UserController::class,'createUser'])->name('create-user');
Route::post('create-user',[UserController::class,'create'])->name('create');
// Route::get('/user', function (){
//     return view("user.user");
// });
// Route::get()



