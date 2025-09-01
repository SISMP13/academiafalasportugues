<?php

namespace Bittacora\MediaIntegrations\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class MediaIntegration extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    protected $guarded = [];

    public $sortable = [
        'sort_when_creating' => true,
    ];

    public function integratable(): MorphTo
    {
        return $this->morphTo();
    }

    public function buildSortQuery()
    {
        return static::query()->where('integratable_type', $this->integratable_type)
            ->where('integratable_id', $this->integratable_id)->orderBy('order_column', 'ASC');
    }
}
