<?php

use Bittacora\Services\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::prefix('bpanel')->middleware(['web', 'auth', 'admin-menu'])->group(function(){
    Route::get('/' . config('bpanel4-services.route_prefix') . '', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/' . config('bpanel4-services.route_prefix') . '/create/language/{locale?}', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/' . config('bpanel4-services.route_prefix') . '/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/' . config('bpanel4-services.route_prefix') . '/{model}/edit/language/{locale?}', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/' . config('bpanel4-services.route_prefix') . '/{model}/update/language/{locale?}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/' . config('bpanel4-services.route_prefix') . '/{model}', [ServiceController::class, 'destroy'])->name('services.destroy');

    if (config('bpanel4-services.categories')){
        Route::name('services.')->group(function () {
            \Bittacora\Category\CategoryFacade::addRoutes(config('bpanel4-services.route_prefix'), \Bittacora\Services\Models\Service::class, ServiceController::class);
        });
    }
});
