<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/animals', App\Http\Controllers\GetAllAnimalsController::class);
Route::get('/europe-mountains', App\Http\Controllers\GetEuropeMountainsController::class);
Route::get('/mountains-no-vowel', App\Http\Controllers\GetMountainsDoesntStartByVowelController::class);

Route::group(['prefix' => 'mountains'], function () {
    Route::get('/', [App\Http\Controllers\MountainController::class, 'index']);
    Route::get('/max', [App\Http\Controllers\MountainController::class, 'max']);
    Route::get('/{id}', [App\Http\Controllers\MountainController::class, 'show']);
});
