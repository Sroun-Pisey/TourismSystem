<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('customers', CustomerController::class);
Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);
