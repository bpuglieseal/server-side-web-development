<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\GetAllCarsController::class)->name('cars.index');
Route::get('/create', App\Http\Controllers\PostCarController::class . '@form')->name('cars.create');
Route::post('/', App\Http\Controllers\PostCarController::class)->name('cars.store');
Route::delete('/{car}', App\Http\Controllers\DeleteCarController::class)->name('cars.destroy');

Route::get('/find', App\Http\Controllers\PostFindController::class . '@form')->name('cars.find.form');
Route::post('/find', App\Http\Controllers\PostFindController::class)->name('cars.find.submit');
Route::get('/advanced', App\Http\Controllers\AdvancedCarController::class . '@form')->name('cars.advanced.form');
Route::post('/advanced', App\Http\Controllers\AdvancedCarController::class)->name('cars.advanced.submit');
