<?php

namespace App\Http\Livewire;

class InputFile extends \Bittacora\FormComponents\Livewire\Form\InputFile
{
    public int $maxUploadSize = 10240;
}
