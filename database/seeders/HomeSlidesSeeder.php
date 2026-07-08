<?php

namespace Database\Seeders;

use Bittacora\Content\ContentFacade;
use Bittacora\Home\Models\Home;
use Bittacora\Home\Models\HomeSlide;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Migra los datos del antiguo slider de portada (columnas fijas de la tabla
 * homes: title/text/text_btn.../title2/text2/...) a la nueva tabla home_slides,
 * reutilizando las imágenes ya subidas en la location "Imagen bloque 1" para
 * no depender de ningún archivo nuevo.
 *
 * Uso: php artisan db:seed --class=HomeSlidesSeeder
 */
class HomeSlidesSeeder extends Seeder
{
    public function run(): void
    {
        if (HomeSlide::count() > 0) {
            $this->command?->info('Ya existen slides, no se crea nada.');
            return;
        }

        $home = DB::table('homes')->first();
        if (!$home) {
            $this->command?->warn('No existe ningún registro en homes, no se puede migrar el slider.');
            return;
        }

        $homeContentId = DB::table('contents')
            ->where('model_type', Home::class)
            ->where('model_id', $home->id)
            ->value('id');

        $oldImageLocationId = DB::table('content_multimedia_images_location')
            ->where('module', 'home')
            ->where('name', 'Imagen bloque 1')
            ->value('id');

        $images = ($homeContentId && $oldImageLocationId)
            ? DB::table('content_multimedia_images')
                ->where('content_id', $homeContentId)
                ->where('location', $oldImageLocationId)
                ->orderBy('order_column')
                ->pluck('multimedia_id')
                ->values()
                ->all()
            : [];

        $newImageLocationId = DB::table('content_multimedia_images_location')
            ->where('module', 'home')
            ->where('name', 'Imagen del slide')
            ->value('id');

        $slideFieldMaps = [
            [
                'title' => 'title',
                'text' => 'text',
                'text_btn' => 'text_btn',
                'url_btn' => 'url_btn',
                'text_btn2' => 'text_btn2',
                'url_btn2' => 'url_btn2',
            ],
            [
                'title' => 'title2',
                'text' => 'text2',
                'text_btn' => 'text_btn3',
                'url_btn' => 'url_btn3',
                'text_btn2' => 'text_btn4',
                'url_btn2' => 'url_btn4',
            ],
        ];

        foreach ($slideFieldMaps as $index => $fieldMap) {
            $hasContent = false;
            foreach ($fieldMap as $homeField) {
                if (!empty($home->$homeField)) {
                    $hasContent = true;
                    break;
                }
            }
            if (!$hasContent) {
                continue;
            }

            $slide = new HomeSlide();
            foreach ($fieldMap as $slideField => $homeField) {
                $decoded = json_decode($home->$homeField ?? 'null', true);
                $slide->setTranslations($slideField, is_array($decoded) ? $decoded : ['es' => $home->$homeField]);
            }
            $slide->active = true;
            $slide->save();

            ContentFacade::associateWithModel($slide);

            $multimediaId = $images[$index] ?? null;
            if ($multimediaId && $newImageLocationId && $slide->content) {
                DB::table('content_multimedia_images')->insert([
                    'content_id' => $slide->content->id,
                    'multimedia_id' => $multimediaId,
                    'location' => $newImageLocationId,
                    'order_column' => 1,
                    'active' => 1,
                    'featured' => 0,
                ]);
            }

            $this->command?->info("Slide {$slide->id} creado a partir de los campos de slider " . ($index + 1));
        }
    }
}
