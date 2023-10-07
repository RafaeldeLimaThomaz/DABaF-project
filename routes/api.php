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

Route::post('/user/new', 
    [App\Http\Controllers\UserController::class, 'store'])->name('user.new');

Route::get('/user/form', 
    [App\Http\Controllers\UserController::class, 'getUserForm'])->name('user.form');

Route::get('/users/all', 
    [App\Http\Controllers\UserController::class, 'all'])->name('user.all');

