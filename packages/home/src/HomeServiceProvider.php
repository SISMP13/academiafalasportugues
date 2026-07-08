<?php

namespace Bittacora\Home;

use Bittacora\Home\Http\Livewire\HomeSlideDatatable;
use Bittacora\Multimedia\MultimediaFacade;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bittacora\Home\Commands\HomeCommand;

class HomeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('home')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_homes_table')
            ->hasCommand(HomeCommand::class);
    }

    public function register(){
        $this->app->bind('home', function($app){
            return new Home();
        });
    }

    public function boot(){

        $this->commands([HomeCommand::class]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'home');
        $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', 'home');
        $this->loadTranslationsFrom(__DIR__ .'/../resources/lang-home-slides', 'home-slides');

        Livewire::component('home::home-slide-datatable', HomeSlideDatatable::class);

        /*MultimediaFacade::registerMediaConversion(function ($media) {
            $media->addMediaConversion('cover')
                ->width(1920)
                ->height(1080)
                ->keepOriginalImageFormat()
                ->crop('crop-center', 1920, 1080)
                ->performOnCollections('images');

        });

        MultimediaFacade::registerMediaConversion(function ($media) {
            $media->addMediaConversion('page_one')
                ->width(889)
                ->height(587)
                ->keepOriginalImageFormat()
                ->crop('crop-center', 889, 597)
                ->performOnCollections('images');

        });

        MultimediaFacade::registerMediaConversion(function ($media) {
            $media->addMediaConversion('page_two')
                ->width(737)
                ->height(737)
                ->keepOriginalImageFormat()
                ->crop('crop-center', 737, 737)
                ->performOnCollections('images');

        });

        MultimediaFacade::registerMediaConversion(function ($media) {
            $media->addMediaConversion('gallery')
                ->width(400)
                ->height(400)
                ->keepOriginalImageFormat()
                ->crop('crop-center', 400, 400)
                ->performOnCollections('images');

        });*/


    }
}
