<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CoursesList extends Component
{
    public mixed $courses;
    public string $title;
    public int $limit;

    /**
     * Create a new component instance.
     */
    public function __construct($courses, $title = '', $limit = 0)
    {
        $this->courses = $courses;

        if ($limit > 0){
            $this->courses = $this->courses->take($limit);
        }

        $this->title = $title;
        $this->limit = $limit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.courses-list');
    }
}
