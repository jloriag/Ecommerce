<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SellController;
use App\Http\Controllers\Api\EcommerceDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('products',ProductController::class);

Route::apiResource('sells',SellController::class);

Route::apiResource('ecommercedata',EcommerceDataController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
