<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {

    Route::get('/users', function () {
        return response()->json(['message' => 'List of users']);
    });

    Route::post('/profile/create', 
    [App\Http\Controllers\ProfileController::class, 'store']);
   

    Route::get('/profile/find/{id}', 
    [App\Http\Controllers\ProfileController::class, 'find']);

    Route::get('/profile/update/{id}', 
    [App\Http\Controllers\ProfileController::class, 'update']);

    Route::get('/profile/delete/{id}', 
    [App\Http\Controllers\ProfileController::class, 'destroy']);
});