<?php

namespace Bittacora\Posts;

use Bittacora\Multimedia\MultimediaFacade;
use Bittacora\Posts\Http\Livewire\PostDatatable;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bittacora\Posts\Commands\PostsCommand;

class PostsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('posts')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_posts_table')
            ->hasCommand(PostsCommand::class);
    }

    public function register(){
        $this->app->bind('posts', function($app){
            return new Posts();
        });
        $this->mergeConfigFrom(__DIR__ . '/../config/posts.php','bpanel4-posts');
    }

    public function boot(){

        $this->commands([PostsCommand::class]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'posts');
        $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', 'posts');
        $this->publishes([__DIR__ . '/../config/posts.php' => config_path('bpanel4-posts.php')],'posts-config');

        Livewire::component('posts::post-datatable', PostDatatable::class);

        /*MultimediaFacade::registerMediaConversion(function ($media) {
            $media->addMediaConversion('cover')
                ->width(1920)
                ->height(1080)
                ->keepOriginalImageFormat()
                ->crop('crop-center', 1920, 1080)
                ->performOnCollections('images');

        });*/

        /*MultimediaFacade::registerMediaConversion(function ($media) {
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

        });*/

        MultimediaFacade::registerMediaConversion(function ($media) {
            $media->addMediaConversion('thumb-post')
                ->width(600)
                ->height(400)
                ->keepOriginalImageFormat()
                ->crop('crop-center', 426, 551)
                ->performOnCollections('images');

        });
    }
}
