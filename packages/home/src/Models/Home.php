<?php

namespace Bittacora\Home\Models;

use Bittacora\Content\Models\ContentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Wildside\Userstamps\Userstamps;

class Home extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = ['save'];

    public $translatable = [
        'title',
        'text',
        'text_btn',
        'url_btn',
        'text_btn2',
        'url_btn2',
        'title2',
        'text2',
        'title3',
        'text3',
        'title4',
        'text4',
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
