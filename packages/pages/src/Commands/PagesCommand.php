<?php

namespace Bittacora\Pages\Commands;

use Bittacora\AdminMenu\AdminMenuFacade;
use Bittacora\ContentMultimediaImages\ContentMultimediaImagesLocationFacade;
use Bittacora\Tabs\Tabs;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PagesCommand extends Command
{
    public $signature = 'pages:install';

    public $description = 'My command';

    public function handle(): void
    {
        $this->comment('Registrando elementos del menú...');
        AdminMenuFacade::createGroup('contents','Contenidos','fa fa-file');
        $module = AdminMenuFacade::createModule('contents', 'pages', 'Páginas', 'fa fa-file');
        AdminMenuFacade::createAction($module->key, 'Listar', 'index', 'fa fa-bars');
        AdminMenuFacade::createAction($module->key, 'Añadir', 'create', 'fa fa-plus');

        $this->comment('Hecho');

        $this->comment('Dando permisos al administrador...');
        $permissions = ['index', 'create', 'edit', 'destroy', 'store', 'update'];


        $adminRole = Role::findOrCreate('admin');
        foreach ($permissions as $permission) {
            $permission = Permission::firstOrCreate(['name' => 'pages.' . $permission]);
            $adminRole->givePermissionTo($permission);
        }

        Tabs::createItem('pages.index', 'pages.index', 'pages.index', 'Páginas', 'fa fa-file');
        Tabs::createItem('pages.index', 'pages.create', 'pages.create', 'Añadir', 'fa fa-plus');
        Tabs::createItem('pages.create', 'pages.index', 'pages.index', 'Páginas', 'fa fa-file');
        Tabs::createItem('pages.create', 'pages.create', 'pages.create', 'Añadir', 'fa fa-plus');
        Tabs::createItem('pages.edit', 'pages.index', 'pages.index', 'Páginas', 'fa fa-file');
        Tabs::createItem('pages.edit', 'pages.create', 'pages.create', 'Añadir', 'fa fa-plus');


        ContentMultimediaImagesLocationFacade::createNewLocation('pages', 'Portada');
        ContentMultimediaImagesLocationFacade::createNewLocation('pages', 'Imagen bloque 1');
        ContentMultimediaImagesLocationFacade::createNewLocation('pages', 'Galería');
        ContentMultimediaImagesLocationFacade::createNewLocation('pages', 'Imagen social');
        ContentMultimediaImagesLocationFacade::createNewLocation('pages', 'Imagen bloque 2');
        ContentMultimediaImagesLocationFacade::createNewLocation('pages', 'Imagen bloque 3');
        $this->comment('Hecho');

    }
}
