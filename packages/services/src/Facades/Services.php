<?php

namespace Bittacora\Services\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bittacora\Services\Services
 */
class Services extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Bittacora\Services\Services::class;
    }
}
