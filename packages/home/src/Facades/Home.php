<?php

namespace Bittacora\Home\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bittacora\Home\Home
 */
class Home extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Bittacora\Home\Home::class;
    }
}
