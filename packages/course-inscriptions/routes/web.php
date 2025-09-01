<?php


use Bittacora\CourseInscriptions\Http\Controllers\CourseInscriptionsController;
use Illuminate\Support\Facades\Route;

Route::prefix('bpanel')->middleware(['web', 'auth', 'admin-menu'])->group(function(){
    Route::get('/course-inscriptions', [CourseInscriptionsController::class, 'index'])->name('courses.course-inscriptions.index');
});
