<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/book')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::get('/create', [BookController::class, 'create']);
    Route::post('/store', [BookController::class, 'store']);
    Route::get('/edit/{id}', [BookController::class, 'edit']);
    Route::post('/update/{id}', [BookController::class, 'update']);
    Route::delete('/destroy/{id}', [BookController::class, 'destroy']);
});


Route::prefix('/writer')->group(function () {
    Route::get('/', [WriterController::class, 'index']);
    Route::get('/create', [WriterController::class, 'create']);
    Route::post('/store', [WriterController::class, 'store']);
    Route::get('/edit/{id}', [WriterController::class, 'edit']);
    Route::post('/update/{id}', [WriterController::class, 'update']);
    Route::delete('/destroy/{id}', [WriterController::class, 'destroy']);
});