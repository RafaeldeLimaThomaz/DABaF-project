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

// Basic API Route
Route::get('/example', function () {
    return ['message' => 'Hello, this is an example API route.'];
});

// API Route with Request Parameters
Route::get('/users/{id}', function ($id) {
    // You can access the {id} parameter here
    return ['user_id' => $id];
});

Route::post('/profile/create', 
    [App\Http\Controllers\ProfileController::class, 'store']);

// API Route with a Controller
// Route::get('/posts', 'PostController@index');
// Route::post('/posts', 'PostController@store');
// Route::get('/posts/{id}', 'PostController@show');
// Route::put('/posts/{id}', 'PostController@update');
// Route::delete('/posts/{id}', 'PostController@destroy');

// API Route Group with Middleware
// Route::middleware('auth:api')->group(function () {
//     Route::get('/profile', 'ProfileController@index');
//     Route::post('/profile', 'ProfileController@update');
// });