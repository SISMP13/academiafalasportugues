<?php

namespace App\View\Composers;

use Bittacora\Language\LanguageFacade;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class LanguageComposer
{
    public function compose(View $view){
        if(!str_contains(url()->current(), 'bpanel') and !str_contains(url()->current(), 'livewire')){
            $languages = LanguageFacade::getActives();
            $view->with('activeLanguages', $languages);
        }

        if(Session::exists('locale')){
            App::setLocale(Session::get('locale'));
        }else{
            App::setLocale('es');
            Session::put('locale', 'es');
        }
    }
}
