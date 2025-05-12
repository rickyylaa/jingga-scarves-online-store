<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('cost', [\App\Http\Controllers\Ecommerce\CartController::class, 'getCost']);
// Route::get('cost', [\App\Http\Controllers\Ecommerce\CartController::class, 'getCourier']);
Route::get('city', [\App\Http\Controllers\Ecommerce\CartController::class, 'getCity']);
Route::get('district', [\App\Http\Controllers\Ecommerce\CartController::class, 'getDistrict']);