<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('auth')->group(function () {
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::get('/validate', [\App\Http\Controllers\AuthController::class, 'validateToken']);
});

Route::prefix('users')->group(function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'getAllUsers']);
    Route::get('/{user}', [\App\Http\Controllers\UserController::class, 'getUserById']);
    Route::put('/{user}', [\App\Http\Controllers\UserController::class, 'updateUserName']);
    Route::delete('/{user}', [\App\Http\Controllers\UserController::class, 'deleteUser']);
});
