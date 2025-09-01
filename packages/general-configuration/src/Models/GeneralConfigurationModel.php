<?php

namespace Bittacora\GeneralConfiguration\Models;

use Bittacora\Content\Models\ContentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class GeneralConfigurationModel extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'general_configurations';

    protected $fillable = [
        'sender_name', 'sender_email', 'reception_email',
        'title', 'meta_title', 'meta_description', 'meta_keywords',
        'facebook', 'x', 'instagram', 'linkedin', 'whatsapp', 'youtube', 'tiktok',
        'business_address', 'business_postal_code', 'business_city', 'business_province',
        'business_country', 'business_phone', 'business_fax', 'business_mobile', 'business_email',
        'footer_copyright', 'footer_description'
    ];

    protected $translatable = [
        'title', 'meta_title', 'meta_description', 'meta_keywords', 'footer_description'
    ];

    protected $with = ['content'];

    public function content()
    {
        return $this->morphOne(ContentModel::class, 'model');
    }
}
