<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\StoreController;

Route::resource('stores', StoreController::class);

use App\Http\Controllers\CategoryController;

Route::resource('categories', CategoryController::class);

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index']);

use App\Http\Controllers\CityController;

Route::resource('cities', CityController::class);