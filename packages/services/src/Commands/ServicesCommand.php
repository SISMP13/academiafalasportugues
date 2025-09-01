<?php

namespace Bittacora\Services\Commands;

use Bittacora\AdminMenu\AdminMenuFacade;
use Bittacora\Category\CategoryFacade;
use Bittacora\ContentMultimediaImages\ContentMultimediaImagesLocationFacade;
use Bittacora\Tabs\Tabs;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\Console\Output\BufferedOutput;

class ServicesCommand extends Command
{
    public $signature = 'services:install';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('Registrando elementos del menú...');
        $module = AdminMenuFacade::createModule('contents', 'services', config('bpanel4-services.name-module'), config('bpanel4-services.icon'));
        AdminMenuFacade::createAction($module->key, 'Listar', 'index', 'fa fa-bars');
        AdminMenuFacade::createAction($module->key, 'Añadir', 'create', 'fa fa-plus');

        $this->comment('Hecho');

        $this->comment('Dando permisos al administrador...');
        $permissions = ['index', 'create', 'edit', 'destroy', 'store', 'update'];


        $adminRole = Role::findOrCreate('admin');
        foreach ($permissions as $permission) {
            $permission = Permission::firstOrCreate(['name' => 'services.' . $permission]);
            $adminRole->givePermissionTo($permission);
        }

        Tabs::createItem('services.index', 'services.index', 'services.index', config('bpanel4-services.name-module'), config('bpanel4-services.icon'));
        Tabs::createItem('services.index', 'services.create', 'services.create', 'Añadir', 'fa fa-plus');
        Tabs::createItem('services.create', 'services.index', 'services.index', config('bpanel4-services.name-module'), config('bpanel4-services.icon'));
        Tabs::createItem('services.create', 'services.create', 'services.create', 'Añadir', 'fa fa-plus');
        Tabs::createItem('services.edit', 'services.index', 'services.index', config('bpanel4-services.name-module'), config('bpanel4-services.icon'));
        Tabs::createItem('services.edit', 'services.create', 'services.create', 'Añadir', 'fa fa-plus');

        if (config('bpanel4-services.categories')){
            $this->comment('Asignando la configuración de las categorías');
            AdminMenuFacade::createAction($module->key, 'Categorías', 'category', 'fa fa-sitemap');
            CategoryFacade::addPermission('services');
            CategoryFacade::createTabs('services', config('bpanel4-services.name-module'));
        }

        //Localizaciones de imágenes en servicios
        if (config('bpanel4-services.images_location')){
            foreach (config('bpanel4-services.images_location_names') as $location){
                ContentMultimediaImagesLocationFacade::createNewLocation('services', $location);
            }
        }

        //Localizaciones de imágenes en categorías
        if (config('bpanel4-services.categories') && config('bpanel4-services.categories_images_location')){
            foreach (config('bpanel4-services.categories_images_location_names') as $location){
                ContentMultimediaImagesLocationFacade::createNewLocation('category', $location);
            }
        }

        $this->comment('Hecho');
    }
}
