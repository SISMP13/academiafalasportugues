<?php

use Bittacora\Contact\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::prefix('bpanel')->middleware(['web', 'auth','admin-menu'])->name('contact.')->group(function(){
    Route::get('/contact/edit/language/{locale?}', [ContactController::class, 'index'])->name('index');
    Route::put('/contact/{model}/update/language/{locale?}', [ContactController::class, 'update'])->name('update');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/contacto', [ContactController::class, 'main'])->name('contact');
    Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.store');
});
