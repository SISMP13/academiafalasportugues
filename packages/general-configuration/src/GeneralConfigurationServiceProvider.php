<?php

namespace Bittacora\GeneralConfiguration;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bittacora\GeneralConfiguration\Commands\GeneralConfigurationCommand;

class GeneralConfigurationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('general-configuration')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_general-configuration_table')
            ->hasCommand(GeneralConfigurationCommand::class);
    }

    public function register()
    {
        $this->app->bind('general-configuration', function($app){
            return new GeneralConfiguration();
        });
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'general-configuration');
        $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', 'general-configuration');
        if ($this->app->runningInConsole()) {
            $this->commands([
                GeneralConfigurationCommand::class
            ]);
        }
    }
}
