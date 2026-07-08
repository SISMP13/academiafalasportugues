<?php


use Bittacora\CourseInscriptions\Http\Controllers\CourseInscriptionsController;
use Illuminate\Support\Facades\Route;

Route::prefix('bpanel')->middleware(['web', 'auth', 'admin-menu'])->group(function(){
    Route::get('/course-inscriptions', [CourseInscriptionsController::class, 'index'])->name('courses.course-inscriptions.index');
    Route::get('/course-inscriptions/{model}/edit', [CourseInscriptionsController::class, 'edit'])->name('courses.course-inscriptions.edit');
    Route::put('/course-inscriptions/{model}', [CourseInscriptionsController::class, 'update'])->name('courses.course-inscriptions.update');
    Route::delete('/course-inscriptions/{model}', [CourseInscriptionsController::class, 'destroy'])->name('courses.course-inscriptions.destroy');
});
