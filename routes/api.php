<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// user register
Route::post('/user/register', [AuthController::class, 'userRegister']);

// restaurant register
Route::post('/restaurant/register', [AuthController::class, 'restaurantRegister']);

// driver register
Route::post('/driver/register', [AuthController::class, 'driverRegister']);

// login
Route::post('/login', [AuthController::class, 'login']);

// update latlong user
Route::put('/user/update-latlong', [AuthController::class, 'updateLatlong'])->middleware('auth:sanctum');

// update fcm id
Route::put('/user/update-fcm', [AuthController::class, 'updateFcmId'])->middleware('auth:sanctum');

// logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// get all restaurant
Route::get('/restaurant', [AuthController::class, 'getRestaurant']);

// products
Route::apiResource('/products', ProductController::class)->middleware('auth:sanctum');

// get product by user id
Route::get('/restaurant/{userId}/products', [ProductController::class, 'getProductByUserId'])->middleware('auth:sanctum');

//order
Route::post('/order', [OrderController::class, 'createOrder'])->middleware('auth:sanctum');

//purchase order
Route::post('/purchase/{orderId}', [OrderController::class, 'purchaseOrder'])->middleware('auth:sanctum');

//get order by user id
Route::get('/order/user', [OrderController::class, 'orderHistory'])->middleware('auth:sanctum');

//get order by driver id
Route::get('/order/driver', [OrderController::class, 'getOrdersByStatusDriver'])->middleware('auth:sanctum');

//update order status
Route::put('/order/restaurant/update-status/{id}', [OrderController::class, 'updateOrderStatus'])->middleware('auth:sanctum');

//update order status driver
Route::put('/order/driver/update-status/{id}', [OrderController::class, 'updateOrderStatusDriver'])->middleware('auth:sanctum');

//update purchase status
Route::put('/order/user/update-status/{id}', [OrderController::class, 'updatePurchaseStatus'])->middleware('auth:sanctum');

//get order by restaurant id
Route::get('/order/restaurant', [OrderController::class, 'getOrdersByRestaurantId'])->middleware('auth:sanctum');
