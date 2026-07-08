<?php

use Bittacora\Home\Http\Controllers\HomeController;
use Bittacora\Home\Http\Controllers\HomeSlideController;
use Illuminate\Support\Facades\Route;

Route::prefix('bpanel')->middleware(['web', 'auth', 'admin-menu'])->group(function(){
    Route::get('/homes/edit/language/{locale?}', [HomeController::class, 'index'])->name('home.index');
    Route::put('/homes/{model}/update/language/{locale?}', [HomeController::class, 'update'])->name('home.update');

    Route::get('/home-slides', [HomeSlideController::class, 'index'])->name('home-slides.index');
    Route::get('/home-slides/create/language/{locale?}', [HomeSlideController::class, 'create'])->name('home-slides.create');
    Route::post('/home-slides/store', [HomeSlideController::class, 'store'])->name('home-slides.store');
    Route::get('/home-slides/{model}/edit/language/{locale?}', [HomeSlideController::class, 'edit'])->name('home-slides.edit');
    Route::put('/home-slides/{model}/update/language/{locale?}', [HomeSlideController::class, 'update'])->name('home-slides.update');
    Route::delete('/home-slides/{model}', [HomeSlideController::class, 'destroy'])->name('home-slides.destroy');
});

Route::middleware(['web'])->group(function(){
    if(!\Illuminate\Support\Facades\Session::exists('locale')){
        \Illuminate\Support\Facades\Session::put('locale', 'es');
    }
    Route::get('/', [HomeController::class, 'main'])->name('home.home');
    //Route::post('/language', [HomeController::class, 'languageSelect'])->name('home.language');
});


