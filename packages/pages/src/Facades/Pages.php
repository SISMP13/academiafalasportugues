<?php

namespace Bittacora\Pages\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bittacora\Pages\Pages
 */
class Pages extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Bittacora\Pages\Pages::class;
    }
}
