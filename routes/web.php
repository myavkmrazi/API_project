<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Dom\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', App\Http\Controllers\PostController::class);
Route::get('/upload', function () {
    return view('upload');
});
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('/upload', [FileUploadController::class, 'store'])->name('upload.file');
Route::get('/posts/{id}/comments', [CommentController::class, 'postComment'])->name('posts.comments');
Route::get('/comments/{id}/int', [CommentController::class, 'commentInt'])->name('comments.int');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/about', [\App\Http\Controllers\PageController::class, 'about'])->name('about');
require __DIR__ . '/admin.php';


