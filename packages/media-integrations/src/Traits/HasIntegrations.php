<?php

namespace Bittacora\MediaIntegrations\Traits;

use Bittacora\MediaIntegrations\Models\MediaIntegration;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasIntegrations
{
    public function integrations(): MorphMany
    {
        return $this->morphMany(MediaIntegration::class, 'integratable');
    }
}
