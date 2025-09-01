<?php


use Bittacora\Courses\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;

Route::prefix('bpanel')->middleware(['web', 'auth', 'admin-menu'])->group(function(){
    Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
    Route::get('/courses/create/language/{locale?}', [CoursesController::class, 'create'])->name('courses.create');
    Route::post('/courses/store', [CoursesController::class, 'store'])->name('courses.store');
    Route::get('/courses/{model}/edit/language/{locale?}', [CoursesController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{model}/update/language/{locale?}', [CoursesController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{model}', [CoursesController::class, 'destroy'])->name('courses.destroy');
});
