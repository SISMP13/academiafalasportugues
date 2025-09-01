<?php

namespace Bittacora\GeneralConfiguration\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bittacora\GeneralConfiguration\GeneralConfiguration
 */
class GeneralConfiguration extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Bittacora\GeneralConfiguration\GeneralConfiguration::class;
    }
}
