<?php

namespace App\View\Components;

use Bittacora\ContentMultimedia\ContentMultimediaFacade;
use Bittacora\Services\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceList extends Component
{
    public int $limit;
    public string $class;

    /**
     * Create a new component instance.
     */
    public function __construct($limit = 0, $class = "section2__services")
    {
        $this->limit = $limit;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if ($this->limit !== 0){
            $services = Service::where('active', 1)->orderBy('order_column')->take($this->limit)->get();
        }else{
            $services = Service::where('active', 1)->orderBy('order_column')->get();
        }
        foreach ($services as $service){
            $service->images=ContentMultimediaFacade::retrieveContentImages('services',$service->content->id);
        }
        return view('components.service-list', compact('services'));
    }
}
