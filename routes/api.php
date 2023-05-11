<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ProductController;
<<<<<<< HEAD
use App\Http\Controllers\Api\V1\DisposableController;
=======
>>>>>>> a0a0412fc406268adaf849b81856f8f8f63919a8


Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('categories', CategoryController::class);
    });

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('products', ProductController::class);
<<<<<<< HEAD
    });

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('disposables', DisposableController::class);
    });
        
=======
    });
>>>>>>> a0a0412fc406268adaf849b81856f8f8f63919a8
