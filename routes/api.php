<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\CommentApiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [App\Http\Controllers\Api\AuthApiController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\AuthApiController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Api\AuthApiController::class, 'logout'])->middleware('auth:sanctum');

 Route::get('/posts', [PostApiController::class, 'index']);
    Route::get('/posts/{post}', [PostApiController::class, 'show']);
    Route::post('/posts', [PostApiController::class, 'store']);
    Route::put('/posts/{post}', [PostApiController::class, 'update']);
    Route::delete('/posts/{post}', [PostApiController::class, 'destroy']);

    // Comments CRUD
    Route::post('/posts/{post}/comments', [CommentApiController::class, 'store']);
    Route::delete('/comments/{comment}', [CommentApiController::class, 'destroy']);