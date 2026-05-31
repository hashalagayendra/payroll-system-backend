<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('users')->group(function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'getAllUsers']);
    Route::post('/', [\App\Http\Controllers\UserController::class, 'createNewUser']);
    Route::get('/{user}', [\App\Http\Controllers\UserController::class, 'getUserById']);
    Route::put('/{user}', [\App\Http\Controllers\UserController::class, 'updateUserName']);
    Route::delete('/{user}', [\App\Http\Controllers\UserController::class, 'deleteUser']);
});
