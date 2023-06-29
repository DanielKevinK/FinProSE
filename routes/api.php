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
//API route for register new user
Route::post('/register', [App\Http\Controllers\UserController::class, 'register']);
//API route for login user
Route::post('/login-api', [App\Http\Controllers\UserController::class, 'loginApi']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    })->name('profile');

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout']);
    
    Route::post('/product', [App\Http\Controllers\ProductController::class, 'addProduct']);
});
