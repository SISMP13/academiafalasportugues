<?php

namespace Bittacora\MediaIntegrations;

use Bittacora\MediaIntegrations\Http\Livewire\IntegrationList;
use Bittacora\MediaIntegrations\Http\Livewire\IntegrationsForm;
use Bittacora\MediaIntegrations\Traits\HasIntegrations;
use Bittacora\MediaIntegrations\View\Components\AllMediaIntegrations;
use Bittacora\MediaIntegrations\View\Components\FacebookMediaIntegration;
use Bittacora\MediaIntegrations\View\Components\InstagramMediaIntegration;
use Bittacora\MediaIntegrations\View\Components\TiktokMediaIntegration;
use Bittacora\MediaIntegrations\View\Components\VimeoMediaIntegration;
use Bittacora\MediaIntegrations\View\Components\XMediaIntegration;
use Bittacora\MediaIntegrations\View\Components\YoutubeMediaIntegration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bittacora\MediaIntegrations\Commands\MediaIntegrationsCommand;

class MediaIntegrationsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('media-integrations')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_media-integrations_table')
            ->hasCommand(MediaIntegrationsCommand::class);
    }

    public function register(){
        $this->app->bind('media-integrations-posts', function($app){
            return new MediaIntegrations();
        });
    }

    public function boot(){
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__. '/../resources/views', 'media-integrations');
        $this->loadTranslationsFrom(__DIR__ .'/../resources/lang', 'media-integrations');
        $this->publishes([__DIR__.'/../resources/views/components/public' => resource_path('views/vendor/media-integrations/components/public'),
        ], 'media-integrations-public');

        //componentes Livewire
        Livewire::component('media-integrations::livewire.integrations-form', IntegrationsForm::class);
        Livewire::component('media-integrations::livewire.integration-list', IntegrationList::class);

        //Componentes Blade (Parte pública)
        Blade::component('media-integrations::components.public.all-media-integrations', AllMediaIntegrations::class);
        Blade::component('media-integrations::components.public.youtube-media-integration', YoutubeMediaIntegration::class);
        Blade::component('media-integrations::components.public.vimeo-media-integration', VimeoMediaIntegration::class);
        Blade::component('media-integrations::components.public.facebook-media-integration', FacebookMediaIntegration::class);
        Blade::component('media-integrations::components.public.instagram-media-integration', InstagramMediaIntegration::class);
        Blade::component('media-integrations::components.public.x-media-integration', XMediaIntegration::class);
        Blade::component('media-integrations::components.public.tiktok-media-integration', TiktokMediaIntegration::class);
    }
}
