<?php

use Bittacora\LegalText\Http\Controllers\LegalTextController;
use Illuminate\Support\Facades\Route;

Route::prefix('bpanel')->middleware(['web', 'auth', 'admin-menu'])->group(function(){
    Route::get('/legal-text', [LegalTextController::class, 'index'])->name('legal-text.index');
    Route::get('/legal-text/create/language/{locale?}', [LegalTextController::class, 'create'])->name('legal-text.create');
    Route::post('/legal-text/store', [LegalTextController::class, 'store'])->name('legal-text.store');
    Route::get('/legal-text/{model}/edit/language/{locale?}', [LegalTextController::class, 'edit'])->name('legal-text.edit');
    Route::put('/legal-text/{model}/update/language/{locale?}', [LegalTextController::class, 'update'])->name('legal-text.update');
    Route::delete('/legal-text/{model}', [LegalTextController::class, 'destroy'])->name('legal-text.destroy');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/legal/{slug}', [LegalTextController::class, 'main'])->name('legal-text.public');
});
