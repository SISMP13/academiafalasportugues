<?php

namespace Bittacora\Contact;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bittacora\Contact\Commands\ContactCommand;

class ContactServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('contact')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_contact_table')
            ->hasCommand(ContactCommand::class);
    }

    public function register(){
        $this->app->bind('contact', function($app){
            return new Contact();
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ .'/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'contact');
        $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', 'contact');
        if ($this->app->runningInConsole()) {
            $this->commands([
                ContactCommand::class
            ]);
        }
    }
}
