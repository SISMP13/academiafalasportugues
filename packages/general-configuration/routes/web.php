<?php

use Bittacora\GeneralConfiguration\Http\Controllers\GeneralConfigurationController;
use Illuminate\Support\Facades\Route;

Route::prefix('bpanel')->middleware(['web', 'auth', 'admin-menu'])->name('general-configuration.')->group(function () {
    Route::get('/general-configuration/edit/language/{locale?}', [GeneralConfigurationController::class, 'index'])->name('index');
    Route::put('/general-configuration/{model}/update/language/{locale?}', [GeneralConfigurationController::class, 'update'])->name('update');
});
