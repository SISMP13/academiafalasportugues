<?php

namespace Bittacora\Services;

use Bittacora\Services\Http\Livewire\ServicesDatatable;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bittacora\Services\Commands\ServicesCommand;

class ServicesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('services')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_services_table')
            ->hasCommand(ServicesCommand::class);
    }

    public function register(){
        $this->app->bind('services', function($app){
            return new Services();
        });
        $this->mergeConfigFrom(__DIR__ . '/../config/services.php','bpanel4-services');
    }

    public function boot(){

        $this->commands([ServicesCommand::class]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'services');
        $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', 'services');
        $this->publishes([__DIR__ . '/../config/services.php' => config_path('bpanel4-services.php')],'services-config');
        Livewire::component('services::services-datatable', ServicesDatatable::class);
    }
}
