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

Route::group(['prefix' => 'task', 'middleware' => ['auth']], function () {
    Route::get('/', \App\Http\Controllers\Task\IndexController::class)->name('task.index');
    Route::get('/create', \App\Http\Controllers\Task\CreateController::class)->name('task.create');
    Route::post('/', \App\Http\Controllers\Task\StoreController::class)->name('task.store');
    Route::get('/{task}/edit', \App\Http\Controllers\Task\EditController::class)->name('task.edit');
    Route::patch('/{task}', \App\Http\Controllers\Task\UpdateController::class)->name('task.update');
    Route::patch('image/{task}', \App\Http\Controllers\Task\ImageUpdateController::class)->name('task.image.update');
    Route::delete('/{task}', \App\Http\Controllers\Task\DeleteController::class)->name('task.delete');
});

Route::group(['prefix' => 'tag', 'middleware' => ['auth']], function () {
    Route::get('/', \App\Http\Controllers\Tag\IndexController::class)->name('tag.index');
    Route::get('/create', \App\Http\Controllers\Tag\CreateController::class)->name('tag.create');
    Route::post('/', \App\Http\Controllers\Tag\StoreController::class)->name('tag.store');
    Route::get('/{tag}/edit', \App\Http\Controllers\Tag\EditController::class)->name('tag.edit');
    Route::patch('/{tag}', \App\Http\Controllers\Tag\UpdateController::class)->name('tag.update');
    Route::delete('/{tag}', \App\Http\Controllers\Tag\DeleteController::class)->name('tag.delete');
});
