<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/auth', [AuthController::class, 'auth']);

Route::get('/products', [ProductController::class, 'findAll']);

Route::get('/products/{produk}', [ProductController::class, 'findOne']);

Route::post('/orders', [OrderController::class, 'store']);

Route::get('/orders', [OrderController::class, 'findAll']);

Route::patch('/orders/{order}', [OrderController::class, 'update']);

Route::delete('orders/{order}',[OrderController::class,'delete']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
