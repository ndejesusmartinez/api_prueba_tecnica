<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->group(function () {
    Route::get('listPrices', [ProductController::class, 'getPrices']);
    Route::post('', [ProductController::class, 'store'])->middleware('auth:api');
    Route::put('/{id}', [ProductController::class, 'update'])->middleware('auth:api');
    Route::get('', [ProductController::class, 'index']);
    Route::delete('/{id}', [ProductController::class, 'destroy'])->middleware('auth:api');
    Route::get('/{id}', [ProductController::class, 'find']);
});

Route::prefix('categories')->group(function () {
    Route::post('', [CategoriesController::class, 'store'])->middleware('auth:api');
    Route::put('/{id}', [CategoriesController::class, 'update'])->middleware('auth:api');
    Route::get('', [CategoriesController::class, 'index']);
    Route::delete('/{id}', [CategoriesController::class, 'destroy'])->middleware('auth:api');
    Route::get('/{id}', [CategoriesController::class, 'find']);
});

Route::prefix('users')->group(function () {
    Route::post('', [UserController::class, 'store']);
    Route::get('', [UserController::class, 'index'])->middleware('auth:api');
    Route::get('/{id}', [UserController::class, 'find']);
    Route::put('/{id}', [UserController::class, 'update'])->middleware('auth:api');
    Route::delete('/{id}', [UserController::class, 'destroy'])->middleware('auth:api');
});

Route::prefix('auth')->group(function () {
    Route::post('', [AuthController::class, 'login']);
});