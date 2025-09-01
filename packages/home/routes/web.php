<?php

use Bittacora\Home\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('bpanel')->middleware(['web', 'auth', 'admin-menu'])->group(function(){
    Route::get('/homes/edit/language/{locale?}', [HomeController::class, 'index'])->name('home.index');
    Route::put('/homes/{model}/update/language/{locale?}', [HomeController::class, 'update'])->name('home.update');
});

Route::middleware(['web'])->group(function(){
    if(!\Illuminate\Support\Facades\Session::exists('locale')){
        \Illuminate\Support\Facades\Session::put('locale', 'es');
    }
    Route::get('/', [HomeController::class, 'main'])->name('home.home');
    //Route::post('/language', [HomeController::class, 'languageSelect'])->name('home.language');
});


