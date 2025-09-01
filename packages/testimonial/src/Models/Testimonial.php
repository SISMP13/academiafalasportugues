<?php

namespace Bittacora\Testimonial\Models;

use Bittacora\Content\Models\ContentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model implements Sortable
{
    use HasFactory, SortableTrait, HasTranslations;

    protected $guarded = ['save'];

    public $translatable = [
        'name',
        'text',
    ];

    public $sortable = [
        'sort_when_creating' => true
    ];

    protected $with = ['content'];

    public function content()
    {
        return $this->morphOne(ContentModel::class, 'model');
    }
}
