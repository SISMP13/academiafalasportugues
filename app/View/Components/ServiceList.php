<?php

namespace App\View\Components;

use Bittacora\ContentMultimedia\ContentMultimediaFacade;

use Bittacora\Courses\Models\CourseModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceList extends Component
{
    public int $limit;
    public string $class;

    /**
     * Crear una nueva instancia del componente
     */
    public function __construct($limit = 0, $class = "section2__courses")
    {
        $this->limit = $limit;
        $this->class = $class;
    }

    /**
     * Renderizar la vista del componente
     */
    public function render(): View|Closure|string
    {
        // Traer cursos activos y aplicar límite si existe
        $query = CourseModel::where('active', 1)->orderBy('order_column', 'ASC');
        if ($this->limit > 0) {
            $query->take($this->limit);
        }
        $courses = $query->get();

        // Cargar imágenes usando ContentMultimediaFacade (igual que en tu controlador)
        foreach ($courses as $course) {
            if ($course->content) {
                $course->images = ContentMultimediaFacade::retrieveContentImages('courses', $course->content->id);
            } else {
                $course->images = [];
            }
        }

        return view('components.service-list', compact('courses'));
    }
}
