<?php

use Bittacora\Testimonial\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::prefix('bpanel')->middleware(['web', 'auth', 'admin-menu'])->group(function(){
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('/testimonial/create/language/{locale?}', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonial/{model}/edit/language/{locale?}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('/testimonial/{model}/update/language/{locale?}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('/testimonial/{model}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
});
