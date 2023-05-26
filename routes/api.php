<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HandlingController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('categories', [CategoryController::class, 'index']);

Route::middleware('auth:api')->group(function () {
    // Route::get('all-customers',[AuthController::class,'getCustomers']);
    // Route::put('update/customers/{profile}',[ProfileController::class,'editProfile']);
    // Route::delete('delete/customers/{id}',[ProfileController::class,'destroy']);

    Route::get('roles', [RolesController::class, 'show']);
    Route::get('users', [UserController::class, 'index']);
    Route::post('add/users', [UserController::class, 'store']);
    Route::put('update/user/{user}', [UserController::class, 'editUser']);
    Route::delete('delete/user/{user}', [UserController::class, 'destroy']);
    Route::get('show/users/{user}', [UserController::class, 'showCustomer']);
    // Route::post('add/adminUsers', [UserController::class, 'storeAdminUsers']);

    Route::get('all-customers', [UserController::class, 'getCustomers']);
    Route::post('add/customer', [UserController::class, 'addCustomer']);
    Route::put('update/customer/{user}', [UserController::class, 'editCustomer']);

    Route::get('all-users', [UserController::class, 'getAllUsers']);

    Route::get('handlings', [HandlingController::class, 'index']);
    Route::get('show/handlings', [HandlingController::class, 'show']);
    Route::get('view/handlings/{handling}', [HandlingController::class, 'view']);
    Route::post('add/handlings', [HandlingController::class, 'store']);
    Route::put('update/handlings/{handling}', [HandlingController::class, 'update']);
    Route::delete('delete/handlings/{handling}', [HandlingController::class, 'destroy']);

    Route::get('services', [ServiceController::class, 'index']);
    Route::get('show/services', [ServiceController::class, 'show']);
    Route::get('view/services/{service}', [ServiceController::class, 'view']);
    Route::post('add/services', [ServiceController::class, 'store']);
    Route::put('update/services/{service}', [ServiceController::class, 'update']);
    Route::delete('delete/services/{service}', [ServiceController::class, 'destroy']);

    Route::get('payments', [PaymentController::class, 'index']);
    Route::get('show/payments', [PaymentController::class, 'show']);
    Route::get('view/payments/{payment}', [PaymentController::class, 'view']);
    Route::post('add/payments', [PaymentController::class, 'store']);
    Route::put('update/payments/{payment}', [PaymentController::class, 'update']);
    Route::delete('delete/payments/{payment}', [PaymentController::class, 'destroy']);

    Route::post('new/orders', [OrderController::class, 'orders']);
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('show/orders/{id}', [OrderController::class, 'view']);
    Route::put('update/orders/{id}', [OrderController::class, 'manualOrder']);
    Route::delete('delete/orders/{order}', [OrderController::class, 'destroy']);
    Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus']);
    Route::put('/orders/{id}/paymentstatus', [OrderController::class, 'updatePaymentStatus']);



    Route::get('reviews', [ReviewController::class, 'index']);
    Route::get('show/reviews', [ReviewController::class, 'show']);
    Route::post('add/reviews', [ReviewController::class, 'store']);
    Route::delete('delete/reviews/{review}', [ReviewController::class, 'destroy']);
    Route::get('view/reviews/{review}', [ReviewController::class, 'view']);
    Route::post('reviews/{reviewId}/reply', [ReviewController::class, 'reply']);
    Route::get('user/comments/{userId}', [ReviewController::class, 'getUserComments']);
    Route::get('admin/replies', [ReviewController::class, 'getAdminReply']);


    // Route::put('/orders/{id}/kilo', [OrderController::class, 'updateKilo']);
    Route::put('/orders/{order}/kilo', [OrderController::class, 'updateKilo']);
    Route::get('kilo/orders', [OrderController::class, 'indexKilo']);
   


});
