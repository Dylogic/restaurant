<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
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

Route::get("/menu", [MenuController::class, "getAll"]);
Route::get("/menu/{min}/{max}", [MenuController::class,"getByPrice"]);

Route::get("/category", [CategoryController::class,"getAll"]);
Route::get("/category/{name}", [CategoryController::class,"getMenusByCategory"]);

Route::get("/order/{order_id}", [OrderController::class,"getMenusByOrderId"]);
Route::get("/order/date/{date}", [OrderController::class,"getOrdersByDate"]);
Route::get("/order/total/date/{date}", [OrderController::class,"getTotalOrdersByDate"]);
