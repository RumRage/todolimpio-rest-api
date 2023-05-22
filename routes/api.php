<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\DisposableController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\ComboController;
use App\Http\Controllers\Api\V1\ScheduleController;


Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('categories', CategoryController::class);
    });

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('products', ProductController::class);
    });

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('disposables', DisposableController::class);
    });
        
Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('services', ServiceController::class);
    });
        
Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('combos', ComboController::class);
    });

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('schedules', ScheduleController::class);
    Route::put('schedules/{schedule}/status', [ScheduleController::class, 'updateStatus']);
    });

   