<?php

namespace Bittacora\Testimonial\Commands;

use Bittacora\AdminMenu\AdminMenuFacade;
use Bittacora\ContentMultimediaImages\ContentMultimediaImagesLocationFacade;
use Bittacora\Tabs\Tabs;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestimonialCommand extends Command
{
    public $signature = 'testimonial:install';

    public $description = 'My command';

    public function handle(): void
    {
        $this->comment('Registrando elementos del menú...');
        AdminMenuFacade::createGroup('contents','Contenidos','fa fa-file');
        $module = AdminMenuFacade::createModule('contents', 'testimonial', 'Testimonios', 'fa fa-quote-right');
        AdminMenuFacade::createAction($module->key, 'Listar', 'index', 'fa fa-bars');
        AdminMenuFacade::createAction($module->key, 'Añadir', 'create', 'fa fa-plus');

        $this->comment('Hecho');

        $this->comment('Dando permisos al administrador...');
        $permissions = ['index', 'create', 'edit', 'destroy', 'store', 'update'];


        $adminRole = Role::findOrCreate('admin');
        foreach ($permissions as $permission) {
            $permission = Permission::firstOrCreate(['name' => 'testimonial.' . $permission]);
            $adminRole->givePermissionTo($permission);
        }

        Tabs::createItem('testimonial.index', 'testimonial.index', 'testimonial.index', 'Testimonios', 'fa fa-star-half-alt');
        Tabs::createItem('testimonial.index', 'testimonial.create', 'testimonial.create', 'Añadir', 'fa fa-plus');
        Tabs::createItem('testimonial.create', 'testimonial.index', 'testimonial.index', 'Testimonios', 'fa fa-star-half-alt');
        Tabs::createItem('testimonial.create', 'testimonial.create', 'testimonial.create', 'Añadir', 'fa fa-plus');
        Tabs::createItem('testimonial.edit', 'testimonial.index', 'testimonial.index', 'Testimonios', 'fa fa-star-half-alt');
        Tabs::createItem('testimonial.edit', 'testimonial.create', 'testimonial.create', 'Añadir', 'fa fa-plus');

        $this->comment('Hecho');
    }
}
