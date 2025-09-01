<?php

namespace App\View\Composers;

use Bittacora\Category\CategoryFacade;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use NguyenHuy\Menu\Models\Menus;

class PublicMenuComposer
{
    public function compose(View $view)
    {
        if (!str_contains(url()->current(), 'bpanel') and !str_contains(url()->current(), 'livewire')) {
            $mainMenu = Menus::where('slug', '1_'.Session::get('locale'))->first();
            if (!$mainMenu){
                $mainMenu = Menus::where('slug', '1_es')->first();
            }
            $view->with('mainMenu', $mainMenu);
        }

        if(!str_contains(url()->current(), 'bpanel') and !str_contains(url()->current(), 'livewire')){
            $footerLegal= Menus::where('slug','2_'.Session::get('locale'))->first();
            if (!$footerLegal){
                $footerLegal = Menus::where('slug', '2_es')->first();
            }
            $view->with('footerLegal',$footerLegal);
        }
    }
}
