<?php

namespace Bittacora\Posts\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bittacora\Posts\Posts
 */
class Posts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Bittacora\Posts\Posts::class;
    }
}
