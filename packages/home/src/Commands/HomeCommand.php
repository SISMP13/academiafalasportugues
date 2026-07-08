<?php

namespace Bittacora\Home\Commands;

use Bittacora\AdminMenu\AdminMenuFacade;
use Bittacora\Content\ContentFacade;
use Bittacora\ContentMultimediaImages\ContentMultimediaImagesLocationFacade;
use Bittacora\Home\Models\Home;
use Bittacora\Tabs\Tabs;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeCommand extends Command
{
    public $signature = 'home:install';

    public $description = 'My command';

    public function handle(): void
    {
        $this->comment('Registrando elementos del menú...');
        AdminMenuFacade::createGroup('contents','Contenidos','fas fa-home');
        $module = AdminMenuFacade::createModule('contents', 'home', 'Portada', 'fas fa-home');
        AdminMenuFacade::createAction($module->key, 'Editar', 'index', 'fas fa-edit');

        $slidesModule = AdminMenuFacade::createModule('contents', 'home-slides', 'Slider Portada', 'fas fa-images');
        AdminMenuFacade::createAction($slidesModule->key, 'Listar', 'index', 'fa fa-bars');
        AdminMenuFacade::createAction($slidesModule->key, 'Añadir', 'create', 'fa fa-plus');

        $this->comment('Hecho');

        $this->comment('Dando permisos al administrador...');
        $permissions = ['index', 'update'];


        $adminRole = Role::findOrCreate('admin');
        foreach ($permissions as $permission) {
            $permission = Permission::firstOrCreate(['name' => 'home.' . $permission]);
            $adminRole->givePermissionTo($permission);
        }

        $slidesPermissions = ['index', 'create', 'store', 'edit', 'update', 'destroy'];
        foreach ($slidesPermissions as $permission) {
            $permission = Permission::firstOrCreate(['name' => 'home-slides.' . $permission]);
            $adminRole->givePermissionTo($permission);
        }

        Tabs::createItem('home.index', 'home.index', 'home.index', 'Portada', 'fas fa-home');

        Tabs::createItem('home-slides.index', 'home-slides.index', 'home-slides.index', 'Slider Portada', 'fas fa-images');
        Tabs::createItem('home-slides.index', 'home-slides.create', 'home-slides.create', 'Añadir', 'fa fa-plus');
        Tabs::createItem('home-slides.create', 'home-slides.index', 'home-slides.index', 'Slider Portada', 'fas fa-images');
        Tabs::createItem('home-slides.create', 'home-slides.create', 'home-slides.create', 'Añadir', 'fa fa-plus');
        Tabs::createItem('home-slides.edit', 'home-slides.index', 'home-slides.index', 'Slider Portada', 'fas fa-images');
        Tabs::createItem('home-slides.edit', 'home-slides.create', 'home-slides.create', 'Añadir', 'fa fa-plus');


        ContentMultimediaImagesLocationFacade::createNewLocation('home', 'Imagen portada');
        ContentMultimediaImagesLocationFacade::createNewLocation('home', 'Imagen sobre nosotros');
        /*ContentMultimediaImagesLocationFacade::createNewLocation('home', 'Sección Proyectos');
        ContentMultimediaImagesLocationFacade::createNewLocation('home', 'marcas');*/

        $model = new Home();
        $model->save();

        ContentFacade::associateWithModel($model);

        $this->comment('Hecho');

    }
}
