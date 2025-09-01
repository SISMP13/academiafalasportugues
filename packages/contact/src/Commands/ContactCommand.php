<?php

namespace Bittacora\Contact\Commands;

use Bittacora\AdminMenu\AdminMenuFacade;
use Bittacora\Contact\Models\ContactModel;
use Bittacora\Content\ContentFacade;
use Bittacora\ContentMultimediaImages\ContentMultimediaImagesLocationFacade;
use Bittacora\Tabs\Tabs;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ContactCommand extends Command
{
    public $signature = 'contact:install';

    public $description = '';

    public function handle()
    {
        $this->comment('Registrando elementos del menú...');
        $module = AdminMenuFacade::createModule('contents', 'contact', 'Página contacto', 'fa fa-envelope');
        AdminMenuFacade::createAction($module->key, 'Editar', 'index', 'fa fa-pencil');

        $this->comment('Hecho');

        $this->comment('Dando permisos al administrador...');
        $permissions = ['index', 'update'];


        $adminRole = Role::findOrCreate('admin');
        foreach ($permissions as $permission) {
            $permission = Permission::firstOrCreate(['name' => 'contact.' . $permission]);
            $adminRole->givePermissionTo($permission);
        }

        Tabs::createItem('contact.index', 'contact.index', 'contact.index', 'Contacto', 'fa fa-envelope');

        ContentMultimediaImagesLocationFacade::createNewLocation('contact', 'Imagen portada');
        /*ContentMultimediaImagesLocationFacade::createNewLocation('contact', 'Imagen bloque');*/

        $model = new ContactModel();
        $model->meta_title="Contacto";
        $model->meta_description ="contacto";
        $model->meta_keywords ="contacto";
        $model->slug="contacto";
        $model->latitude="38.87860";
        $model->longitude="-6.97028";
        $model->zoom="14";
        $model->save();

        ContentFacade::associateWithModel($model);
        $this->comment('Hecho');
    }
}
