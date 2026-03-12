<?php

use App\Http\Controllers\AfspraakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/afspraken', [AfspraakController::class, 'index']);
Route::post('/afspraken', [AfspraakController::class, 'store']);
Route::get('/afspraken/{id}', [AfspraakController::class, 'show']);

Route::put('/afspraken/{id}', [AfspraakController::class, 'update']);
Route::delete('/afspraken/{id}', [AfspraakController::class, 'destroy']);

Route::post('/login', [AuthController::class, 'login']);