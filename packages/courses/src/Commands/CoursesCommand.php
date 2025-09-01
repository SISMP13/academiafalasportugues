<?php

namespace Bittacora\Courses\Commands;

use Bittacora\AdminMenu\AdminMenuFacade;
use Bittacora\ContentMultimediaImages\ContentMultimediaImagesLocationFacade;
use Bittacora\Tabs\Tabs;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CoursesCommand extends Command
{
    public $signature = 'courses:install';

    public $description = 'My command';

    public function handle(): void
    {
        $this->comment('Registrando elementos del menú...');
        AdminMenuFacade::createGroup('contents', 'Contenidos', 'fa fa-file');
        $module = AdminMenuFacade::createModule('contents', 'courses', 'Cursos', 'fa fa-graduation-cap');
        AdminMenuFacade::createAction($module->key, 'Listar', 'index', 'fa fa-bars');
        AdminMenuFacade::createAction($module->key, 'Añadir', 'create', 'fa fa-plus');

        $this->comment('Hecho');

        $this->comment('Dando permisos al administrador...');
        $permissions = ['index', 'create', 'edit', 'destroy', 'store', 'update'];


        $adminRole = Role::findOrCreate('admin');
        foreach ($permissions as $permission) {
            $permission = Permission::firstOrCreate(['name' => 'courses.' . $permission]);
            $adminRole->givePermissionTo($permission);
        }

        Tabs::createItem('courses.index', 'courses.index', 'courses.index', 'Cursos', 'fa fa-graduation-cap');
        Tabs::createItem('courses.index', 'courses.create', 'courses.create', 'Añadir', 'fa fa-plus');
        Tabs::createItem('courses.create', 'courses.index', 'courses.index', 'Cursos', 'fa fa-graduation-cap');
        Tabs::createItem('courses.create', 'courses.create', 'courses.create', 'Añadir', 'fa fa-plus');
        Tabs::createItem('courses.edit', 'courses.index', 'courses.index', 'Cursos', 'fa fa-graduation-cap');
        Tabs::createItem('courses.edit', 'courses.create', 'courses.create', 'Añadir', 'fa fa-plus');


        ContentMultimediaImagesLocationFacade::createNewLocation('courses', 'Imagen destacada');
        ContentMultimediaImagesLocationFacade::createNewLocation('courses', 'Galería');

        $this->comment('Hecho');
    }
}
