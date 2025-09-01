<?php

namespace Bittacora\CourseInscriptions\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bittacora\CourseInscriptions\CourseInscriptions
 */
class CourseInscriptions extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Bittacora\CourseInscriptions\CourseInscriptions::class;
    }
}
