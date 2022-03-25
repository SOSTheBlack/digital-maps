<?php

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::namespace('Users')->prefix('/users')->group(function () {
        Route::get('/me', function (Request $request) {
            return new UserResource($request->user());
        })->name('users.me');
    });
});

Route::prefix('users')->namespace('Users')->name('users')->group(function () {
    Route::post('/storage')->uses('StorageUserController')->name('.storage');
    Route::post('/login')->uses('LoginController')->name('.login');
});


