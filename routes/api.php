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

    Route::prefix('/point-interests')->namespace('PointInterests')->name('point-interests.')->group(function () {
        Route::get('/')->name('list')->uses('ListController');
        Route::post('/approximation')->name('approximation')->uses('ListApproximationController');
        Route::post('/')->name('storage')->uses('StorageController');

        Route::prefix('/approximations')->namespace('Approximations')->name('approximations.')->group(function () {
            Route::post('/')->name('storage')->uses('StorageController');
        });
    });
});

Route::prefix('users')->namespace('Users')->name('users.')->group(function () {
    Route::post('/storage')->name('storage')->uses('StorageController');
    Route::post('/login')->name('login')->uses('LoginController');
});


