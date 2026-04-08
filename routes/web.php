<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\StoreController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\CityController;

use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/stores/import', [StoreController::class, 'import'])->name('stores.import');

// PROTECTED
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('stores', StoreController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('cities', CityController::class);
});