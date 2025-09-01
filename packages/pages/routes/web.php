<?php


use Bittacora\Pages\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::prefix('bpanel')->middleware(['web', 'auth', 'admin-menu'])->group(function(){
    Route::get('/pages', [PagesController::class, 'index'])->name('pages.index');
    Route::get('/pages/create/language/{locale?}', [PagesController::class, 'create'])->name('pages.create');
    Route::post('/pages/store', [PagesController::class, 'store'])->name('pages.store');
    Route::get('/pages/{model}/edit/language/{locale?}', [PagesController::class, 'edit'])->name('pages.edit');
    Route::put('/pages/{model}/update/language/{locale?}', [PagesController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{model}', [PagesController::class, 'destroy'])->name('pages.destroy');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/pagina/{slug}', [PagesController::class, 'main'])->name('pages.public');
});
