<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RatingController;

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

Route::get('/', [BookController::class, 'index']);
Route::get('/author', [AuthorController::class, 'index']);
Route::get('/author/{id}', [AuthorController::class, 'getBook']);
Route::get('/rating', [RatingController::class, 'index']);
Route::post('/rating/save', [RatingController::class, 'save']);
