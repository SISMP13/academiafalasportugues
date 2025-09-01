<?php

namespace Bittacora\Posts\Models;

use Bittacora\Content\Models\ContentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Wildside\Userstamps\Userstamps;

class Post extends Model
{
    use HasFactory;
    use HasTranslations;
    use Userstamps;
    use HasTranslatableSlug;

    protected $guarded = ['save'];

    public $translatable = [
        'title',
        'short_text',
        'title_2',
        'long_text',
        'title_3',
        'long_text_2',
        'breadcrumb',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public $sortable = [
        'sort_when_creating' => true
    ];

    protected $with = ['content'];

    public function content()
    {
        return $this->morphOne(ContentModel::class, 'model');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::createWithLocales([$this->getLocale()])
            ->generateSlugsFrom(function($model, $locale) {
                return "{$model->title}";
            })
            ->doNotGenerateSlugsOnUpdate()
            ->saveSlugsTo('slug');
    }

    public function setMetas($request,$model){
        if(empty($request->input('meta_title'))){
            $model->fill([
                'meta_title' => $model->title,
            ]);
        }
        if(empty($request->input('meta_description'))){
            $description = $model->setMetaDescription($model->meta_description,$model->long_text);
            $model->fill([
                'meta_description' => $description,
            ]);
        }
        if(empty($request->input('meta_keywords'))){
            $keywords = $model->setMetaKeywords($model->meta_keywords,$model->long_text);
            $model->fill([
                'meta_keywords' => $keywords,
            ]);
        }
    }

    /**
     * Generamos la descripción correspondiente para las metas de la página.
     */
    protected function setMetaDescription($description, $text = '')
    {
        if (empty($description)) {
            if (empty($text)) {
                return null;
            }
            $text = $this->translateHtml($text);
            return Str::limit($text, 145);
        }
        return $description;
    }

    /**
     * Generamos las palabras claves correspondientes para las metas de la página.
     */
    protected function setMetaKeywords($keywords, $text = '')
    {
        if (empty($keywords)) {
            if (!empty($text)) {
                $text = $this->translateHtml($text);
                $keywords = $this->mostFrequentWords($text);
            }
        }
        if (!empty($keywords)) {
            return $keywords;
        }
        return null;
    }

    private function translateHtml($text): array|string
    {
        $text = trim(strip_tags($text));
        $text = preg_replace('#\r\n#', ' ', $text);
        $repl = ['&aacute;' => 'á', '&eacute;' => 'é', '&iacute;' => 'í', '&oacute;' => 'ó', '&uacute;' => 'ú', '&ntilde;' => 'ñ', '&Aacute;' => 'Á', '&Eacute;' => 'É', '&Iacute;' => 'Í', '&Oacute;' => 'Ó', '&Uacute;' => 'Ú', '&Ntilde' => 'Ñ', '&lt;' => '<', '&gt;' => '>', '&amp;' => '&', '&quot;' => '"', '&nbsp;' => ' ', '&apos;' => '\'', '&atilde;' => 'ã', '&otilde;' => 'õ', '&ldquo;' => '“', '&rdquo;' => '”', '&copy;' => '(c)', '&laquo;' => '«', '&raquo;' => '»', '&reg;' => '(R)', '&deg;' => 'gr.', '&cent;' => 'cent', '&pound;' => 'pound', '&sect;' => 's', '&plusmn;' => '+/-', '&para;' => '', '&middot;' => '', '&frac12;' => '1/2', '&ndash;' => '-', '&mdash;' => '--', '&lsquo;' => '\'', '&rsquo;' => '\'', '&sbquo;' => '\'', '&bdquo;' => ',,', '&dagger;' => '*', '&Dagger;' => '**', '&bull;' => '*', '&hellip;' => '...', '&prime;' => '\'', '&Prime;' => '\'', '&euro;' => 'euro', '&trade;' => '(tm)', '&asymp;' => '~', '&ne;' => '!=', '&le;' => '<=', '&ge;' => '>=', '&ccedil;' => 'ç', '&Ccedil;' => 'Ç', '&acirc;' => 'â', '&ecirc;' => 'ê', '&icirc;' => 'î', '&ocirc;' => 'ô', '&ucirc;' => 'û', '&Acirc;' => 'Â', '&Ecirc;' => 'Ê', '&Icirc;' => 'Î', '&Ocirc;' => 'Ô', '&Ucirc;' => 'Û', '&#39;' => '\'', '	' => ' ', '&ordm;' => 'º', '&ordf;' => 'ª'];
        foreach ($repl as $no => $yes) {
            $text = str_replace($no, $yes, $text);
        }
        return $text;
    }

    /**
     * Obtenemos las palabras más utilizadas de un texto.
     */
    protected function mostFrequentWords($string, $limit = 10): array|string
    {
        if (empty($string)) {
            return '';
        }
        $words = [];
        $array = explode(" ", $string);
        $prepositions = ['vía', 'versus', 'mediante', 'a', 'ante', 'bajo', 'cabe', 'con', 'contra', 'de', 'desde', 'durante', 'en', 'entre', 'hasta', 'para', 'por', 'según', 'sin', 'so', 'sobre', 'tras', 'este', 'esté', 'porque', 'porqué', 'que', 'qué', 'la', 'las', 'el', 'del', 'lo', 'los', 'le', 'les', 'su', 'sus', 'usted', 'él', 'mas', 'más', 'yo', 'tu', 'nosotros', 'nos', 'vosotros', 'vos', 'ellos', 'si', 'sí', 'como', 'donde', 'cuando'];
        $x = 0;
        foreach ($array as $value) {
            $value = mb_strtolower($value);
            if (strlen($value) > 4 and !in_array($value, $prepositions)) {
                if ($limit > $x) {
                    $words[] = $value;
                }
                ++$x;
            }
        }
        if (empty($words)) {
            return '';
        }
        $words = array_unique($words);
        $words = implode(", ", $words);
        $find = [",, ", "., ", "(", ")", "!", "¡", "?", "¿", "	"];
        $repl = [", ", ", ", "", "", "", "", "", "", ""];
        return str_replace($find, $repl, $words);
    }
}
