<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Dom\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', App\Http\Controllers\PostController::class);
Route::resource('comments', CommentController::class);
Route::get('/upload', function () {
    return view('upload');
});
Route::post('/upload', [FileUploadController::class, 'store'])->name('upload.file');
Route::get('/posts/{id}/comments', [CommentController::class, 'postComment'])->name('posts.comments');
