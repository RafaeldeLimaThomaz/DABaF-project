<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/post/form', 
    [App\Http\Controllers\PostController::class, 'getPostForm'])->name('post.form');

    Route::post('/post/create', 
    [App\Http\Controllers\PostController::class, 'store'])->name('post.create');

    Route::get('/posts/all', 
    [App\Http\Controllers\PostController::class, 'all'])->name('posts.all');
    
});