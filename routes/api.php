<?php

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::namespace('Users')->prefix('/users')->group(function () {
        Route::get('/me', function (Request $request) {
            return new UserResource($request->user());
        });
    });
});

Route::post('users/storage')->uses('Users\StorageUserController')->name('users.storage');
