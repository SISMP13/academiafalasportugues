<?php

namespace App\Providers;

use App\Http\Livewire\InputFile;
use App\View\Composers\LanguageComposer;
use App\View\Composers\PublicMenuComposer;
use Bittacora\GeneralConfiguration\View\Composers\GeneralConfigurationsComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*',PublicMenuComposer::class);
        View::composer('*',GeneralConfigurationsComposer::class);
        View::composer('*',LanguageComposer::class);
        Paginator::useBootstrapFour();
        //Cambio la clase del componente de livewire para poder modificar el peso máximo de archivos que puedo subir
        Livewire::component('form::input-file', InputFile::class);
        Livewire::component('form.input-file', InputFile::class);
    }
}
