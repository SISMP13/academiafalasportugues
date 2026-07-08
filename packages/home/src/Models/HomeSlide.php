<?php

namespace Bittacora\Home\Models;

use Bittacora\Content\Models\ContentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class HomeSlide extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;
    use HasTranslations;

    protected $guarded = ['save'];

    public $translatable = [
        'title',
        'text',
        'text_btn',
        'url_btn',
        'text_btn2',
        'url_btn2',
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
