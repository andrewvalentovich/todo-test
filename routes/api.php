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

Route::group(['prefix' => 'task'], function () {
    Route::post('/store', \App\Http\Controllers\API\Task\StoreController::class);
});

Route::group(['prefix' => 'planner'], function () {
    Route::post('/store', \App\Http\Controllers\API\Planner\StoreController::class);
});
