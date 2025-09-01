<?php

use Bittacora\Posts\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('bpanel')->middleware(['web', 'auth', 'admin-menu'])->group(function(){
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create/language/{locale?}', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{model}/edit/language/{locale?}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{model}/update/language/{locale?}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{model}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/blog', [PostController::class, 'main'])->name('posts.public');
    Route::get('/blog/{slug}', [PostController::class, 'postDetails'])->name('posts.details');
});
