<?php

namespace Bittacora\GeneralConfiguration\Commands;

use Bittacora\AdminMenu\AdminMenuFacade;
use Bittacora\Content\ContentFacade;
use Bittacora\ContentMultimediaImages\ContentMultimediaImagesLocationFacade;
use Bittacora\GeneralConfiguration\Models\GeneralConfigurationModel;
use Bittacora\Tabs\Tabs;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GeneralConfigurationCommand extends Command
{
    public $signature = 'general-configuration:install';

    public $description = '';

    public function handle()
    {
        $this->comment('Registrando elementos del menú...');
        $module = AdminMenuFacade::createModule('configuration', 'general-configuration', 'General', 'fa fa-cog');
        AdminMenuFacade::createAction($module->key, 'Editar', 'index', 'fas fa-pencil');

        $this->comment('Hecho');

        $this->comment('Dando permisos al administrador...');
        $permissions = ['index', 'update'];


        $adminRole = Role::findOrCreate('admin');
        foreach ($permissions as $permission) {
            $permission = Permission::firstOrCreate(['name' => 'general-configuration.' . $permission]);
            $adminRole->givePermissionTo($permission);
        }

        Tabs::createItem('general-configuration.index', 'general-configuration.index', 'general-configuration.index', 'General', 'fa fa-cog');

        ContentMultimediaImagesLocationFacade::createNewLocation('general-configuration', 'Logo header');
        ContentMultimediaImagesLocationFacade::createNewLocation('general-configuration', 'Logo footer');
        ContentMultimediaImagesLocationFacade::createNewLocation('general-configuration', 'Imagen social');
        ContentMultimediaImagesLocationFacade::createNewLocation('general-configuration', 'Subvenciones');

        $model = new GeneralConfigurationModel();
        $model->save();

        ContentFacade::associateWithModel($model);
        $this->comment('Hecho');
    }
}
