<?php

namespace Bittacora\MediaIntegrations\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bittacora\MediaIntegrations\MediaIntegrations
 */
class MediaIntegrationsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'media-integrations-posts';
    }
}
