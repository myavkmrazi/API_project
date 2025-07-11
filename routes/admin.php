<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Controllers\Admin\AuthController;
use Illuminate\Controllers\Admin\PostController;
use Illuminate\Controllers\Admin\CommentController;
use Dom\Comment;

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
        Route::get('login_process', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');

        Route::middleware("auth:admin")->group(function () {
            Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
            Route::resource('comments', App\Http\Controllers\Admin\CommentController::class);

        });

    });
