<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SellController;
use App\Http\Controllers\Api\EcommerceDataController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('products',ProductController::class);

Route::apiResource('sells',SellController::class);

Route::apiResource('ecommercedata',EcommerceDataController::class);

Route::apiResource('user',UserController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
