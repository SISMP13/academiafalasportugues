<?php

namespace Bittacora\LegalText;

use Bittacora\LegalText\Http\Livewire\LegalTextDatatable;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bittacora\LegalText\Commands\LegalTextCommand;

class LegalTextServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('legal-text')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_legal-texts_table')
            ->hasCommand(LegalTextCommand::class);
    }

    public function register(){
        $this->app->bind('legal-text', function($app){
            return new LegalText();
        });
    }

    public function boot(){

        $this->commands([LegalTextCommand::class]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'legal-text');
        $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', 'legal-text');

        Livewire::component('legal-text::legal-text-datatable', LegalTextDatatable::class);
    }
}
