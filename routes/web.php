<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Controller\UserController;

/*C:\xampp\htdocs\al-badr-training-master\app\Http\Controllers\Dashboard
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// users routes 


// Route::resource('users', UserController::class);

// Route::get('user/soft/delete/{id}', [UserController::class ,'soft_delete'])->name('soft.delete');

// Route::get('user/trash', [UserController::class, 'trasheduser'])->name('user.trash');

// Route::get('user/back/from/trash/{id}', [UserController::class, 'restore'])->name('product.back.from.trash');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
