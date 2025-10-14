<?php

use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Public Routes
Route::post('/saveRole', [RoleController::class, 'store']);
Route::get('/getRoles', [RoleController::class, 'index']);
Route::get('/getRole/{id}', [RoleController::class, 'show']);
Route::post('/updateRole/{id}', [RoleController::class, 'update']);
Route::delete('/deleteRole/{id}', [RoleController::class, 'delete']);

//Protected Routes
Route::middleware(['auth:sanctum'])->group(function () {});
