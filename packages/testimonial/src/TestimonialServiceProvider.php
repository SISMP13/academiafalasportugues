<?php

namespace Bittacora\Testimonial;

use Bittacora\Testimonial\Http\Livewire\TestimonialDatatable;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bittacora\Testimonial\Commands\TestimonialCommand;

class TestimonialServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('testimonial')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_testimonial_table')
            ->hasCommand(TestimonialCommand::class);
    }

    public function register(){
        $this->app->bind('testimonial', function($app){
            return new Testimonial();
        });
    }

    public function boot(){

        $this->commands([TestimonialCommand::class]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'testimonial');
        $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', 'testimonial');

        Livewire::component('testimonial::testimonial-datatable', TestimonialDatatable::class);
    }
}
