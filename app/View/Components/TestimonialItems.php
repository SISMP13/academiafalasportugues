<?php

namespace App\View\Components;

use Bittacora\Testimonial\Models\Testimonial;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TestimonialItems extends Component
{
    public int $limit;
    public int $wordCount;

    /**
     * Create a new component instance.
     */
    public function __construct($limit = 0, $wordCount = 18)
    {
        $this->limit = $limit;
        $this->wordCount = $wordCount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if ($this->limit !== 0){
            $testimonials = Testimonial::where('active', 1)->orderBy('order_column')->take($this->limit)->get();
        }else{
            $testimonials = Testimonial::where('active', 1)->orderBy('order_column')->get();
        }
        return view('components.testimonial-items', compact('testimonials'));
    }
}
