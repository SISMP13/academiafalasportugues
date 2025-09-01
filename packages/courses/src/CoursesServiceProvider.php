<?php

namespace Bittacora\Courses;

use Bittacora\Courses\Http\Livewire\CourseDatatable;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bittacora\Courses\Commands\CoursesCommand;

class CoursesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('courses')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_courses_table')
            ->hasCommand(CoursesCommand::class);
    }

    public function register(){
        $this->app->bind('courses', function($app){
            return new Courses();
        });
        $this->mergeConfigFrom(__DIR__ . '/../config/courses.php','bpanel4-courses');
    }

    public function boot(){

        $this->commands([CoursesCommand::class]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'courses');
        $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', 'courses');
        $this->publishes([__DIR__ . '/../config/courses.php' => config_path('bpanel4-courses.php')],'courses-config');
        Livewire::component('courses::courses-datatable', CourseDatatable::class);
    }
}
