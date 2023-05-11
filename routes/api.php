<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\DisposableController;


Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('categories', CategoryController::class);
    });

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('products', ProductController::class);
    });

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('disposables', DisposableController::class);
    });
        