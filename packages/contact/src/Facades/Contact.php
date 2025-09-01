<?php

namespace Bittacora\Contact\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bittacora\Contact\Contact
 */
class Contact extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Bittacora\Contact\Contact::class;
    }
}
