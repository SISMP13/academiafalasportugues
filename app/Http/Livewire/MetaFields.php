<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MetaFields extends Component
{
    public ?string $metaTitle = null;
    public ?string $metaDescription = null;
    public ?string $metaKeywords = null;
    public $socialImage = null;
    public ?string $ogUrl = null;

    public function mount(?string $metaTitle = null, ?string $metaDescription = null, ?string $metaKeywords = null, ?string $ogUrl = null){

        if(!empty($metaTitle)){
            $this->metaTitle = $metaTitle;
        }

        if(!empty($metaDescription)){
            $this->metaDescription = $metaDescription;
        }

        if(!empty($metaKeywords)){
            $this->metaKeywords = $metaKeywords;
        }

        if(!empty($ogUrl)){
            $this->ogUrl = $ogUrl;
        }

    }

    public function render()
    {
        return view('livewire.meta-fields');
    }
}
