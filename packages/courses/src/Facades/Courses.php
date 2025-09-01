<?php

namespace Bittacora\Courses\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bittacora\Courses\Courses
 */
class Courses extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Bittacora\Courses\Courses::class;
    }
}
