<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'task'], function () {
    Route::get('/', \App\Http\Controllers\Task\IndexController::class)->name('task.index');
    Route::get('/create', \App\Http\Controllers\Task\CreateController::class)->name('task.create');
    Route::post('/', \App\Http\Controllers\Task\StoreController::class)->name('task.store');
    Route::get('/{task}/edit', \App\Http\Controllers\Task\EditController::class)->name('task.edit');
    Route::patch('/{task}', \App\Http\Controllers\Task\UpdateController::class)->name('task.update');
    Route::delete('/{task}', \App\Http\Controllers\Task\DeleteController::class)->name('task.delete');
});
