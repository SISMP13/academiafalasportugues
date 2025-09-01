<?php

namespace Bittacora\Testimonial\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bittacora\Testimonial\Testimonial
 */
class Testimonial extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Bittacora\Testimonial\Testimonial::class;
    }
}
