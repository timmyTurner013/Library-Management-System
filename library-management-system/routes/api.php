<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\User;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookMetaController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);

Route::put('/users/{user}', [UserController::class, 'update']);

Route::delete('/users/{user}', [UserController::class, 'destroy']);

Route::get('/books', [BookController::class, 'index']);

Route::get('/books/name={slug}', [BookController::class, 'searchName']);

Route::get('/books/author={slug}', [BookController::class, 'searchAuthor']);

Route::post('/books', [BookController::class, 'store']);

Route::put('/books/{book}', [BookController::class, 'update']);

Route::delete('/books/{book}', [BookController::class, 'destroy']);

Route::post('/issue/{book_name}/{user_name}', [BookMetaController::class, 'store']);

Route::delete('/submit/{book_name}/{user_name}', [BookMetaController::class, 'destroy']);