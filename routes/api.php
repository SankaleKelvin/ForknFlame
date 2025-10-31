<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Public Routes
Route::get('/getRoles', [RoleController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


//Protected Routes
Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);


    //User
    Route::get('/getUser', [UserController::class, 'index']);
    Route::post('/saveUser', [UserController::class, 'store']);
    Route::get('/getUser/{id}', [UserController::class, 'show']);
    Route::post('/updateUser/{id}', [UserController::class, 'update']);
    Route::delete('/deleteUser/{id}', [UserController::class, 'delete']);

    //Roles
    Route::post('/saveRole', [RoleController::class, 'store']);
    Route::get('/getRole/{id}', [RoleController::class, 'show']);
    Route::post('/updateRole/{id}', [RoleController::class, 'update']);
    Route::delete('/deleteRole/{id}', [RoleController::class, 'delete']);

    //Restaurant
    Route::post('/saveRestaurant', [RestaurantController::class, 'store']);
    Route::get('/getRestaurant', [RestaurantController::class, 'index']);
    Route::get('/getRestaurant/{id}', [RestaurantController::class, 'show']);
    Route::post('/updateRestaurant/{id}', [RestaurantController::class, 'update']);
    Route::delete('/deleteRestaurant/{id}', [RestaurantController::class, 'delete']);

    //Category
    Route::post('/saveCategory', [CategoryController::class, 'store']);
    Route::get('/getCategory', [CategoryController::class, 'index']);
    Route::get('/getCategory/{id}', [CategoryController::class, 'show']);
    Route::post('/updateCategory/{id}', [CategoryController::class, 'update']);
    Route::delete('/deleteCategory/{id}', [CategoryController::class, 'delete']);

    //Food
    Route::post('/saveFood', [FoodController::class, 'store']);
    Route::get('/getFood', [FoodController::class, 'index']);
    Route::get('/getFood/{id}', [FoodController::class, 'show']);
    Route::post('/updateFood/{id}', [FoodController::class, 'update']);
    Route::delete('/deleteFood/{id}', [FoodController::class, 'delete']);

    //Order
    Route::post('/saveOrder', [OrderController::class, 'store']);
    Route::get('/getOrder', [OrderController::class, 'index']);
    Route::get('/getOrder/{id}', [OrderController::class, 'show']);
    Route::post('/updateOrder/{id}', [OrderController::class, 'update']);
    Route::delete('/deleteOrder/{id}', [OrderController::class, 'delete']);
    Route::post('/calculateOrder', [OrderController::class, 'calculateOrder']);

    //Payment
    Route::post('/savePayment', [PaymentController::class, 'store']);
    Route::get('/getPayment', [PaymentController::class, 'index']);
    Route::get('/getPayment/{id}', [PaymentController::class, 'show']);
    Route::post('/updatePayment/{id}', [PaymentController::class, 'update']);
    Route::delete('/deletePayment/{id}', [PaymentController::class, 'delete']);
});
