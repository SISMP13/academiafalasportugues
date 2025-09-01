<?php

namespace Bittacora\LegalText\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bittacora\LegalText\LegalText
 */
class LegalText extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Bittacora\LegalText\LegalText::class;
    }
}
