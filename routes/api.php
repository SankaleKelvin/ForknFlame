<?php

use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Public Routes
Route::post('/saveRole', [RoleController::class, 'store']);
Route::get('/getRoles', [RoleController::class, 'index']);

//Protected Routes
Route::middleware(['auth:sanctum'])->group(function () {});
