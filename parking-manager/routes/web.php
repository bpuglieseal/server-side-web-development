<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\GetAllCarsController::class)->name('cars.index');
Route::post('/', App\Http\Controllers\PostCarController::class)->name('cars.store');
