<?php

namespace Bittacora\CourseInscriptions;

use Bittacora\CourseInscriptions\Http\Livewire\CourseInscriptionsDatatable;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bittacora\CourseInscriptions\Commands\CourseInscriptionsCommand;

class CourseInscriptionsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('course-inscriptions')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_course-inscriptions_table')
            ->hasCommand(CourseInscriptionsCommand::class);
    }

    public function register(){
        $this->app->bind('course-inscriptions', function($app){
            return new CourseInscriptions();
        });
    }

    public function boot(){

        $this->commands([CourseInscriptionsCommand::class]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'course-inscriptions');
        $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', 'course-inscriptions');

        Livewire::component('course-inscriptions::inscriptions-datatable', CourseInscriptionsDatatable::class);
    }
}
