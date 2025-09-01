<?php

namespace Bittacora\Pages;

use Bittacora\Multimedia\MultimediaFacade;
use Bittacora\Pages\Http\Livewire\PageDatatable;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bittacora\Pages\Commands\PagesCommand;

class PagesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('pages')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_pages_table')
            ->hasCommand(PagesCommand::class);
    }

    public function register(){
        $this->app->bind('pages', function($app){
            return new Pages();
        });
    }

    public function boot(){

        $this->commands([PagesCommand::class]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'pages');
        $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', 'pages');

        Livewire::component('pages::page-datatable', PageDatatable::class);

        MultimediaFacade::registerMediaConversion(function ($media) {
            $media->addMediaConversion('cover')
                ->width(1920)
                ->height(1080)
                ->keepOriginalImageFormat()
                ->crop('crop-center', 1920, 1080)
                ->performOnCollections('images');

        });

        MultimediaFacade::registerMediaConversion(function ($media) {
            $media->addMediaConversion('gallery')
                ->width(400)
                ->height(400)
                ->keepOriginalImageFormat()
                ->crop('crop-center', 400, 400)
                ->performOnCollections('images');

        });


    }
}
