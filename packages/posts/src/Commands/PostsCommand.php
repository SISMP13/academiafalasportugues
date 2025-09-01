<?php

namespace Bittacora\Posts\Commands;

use Bittacora\AdminMenu\AdminMenuFacade;
use Bittacora\ContentMultimediaImages\ContentMultimediaImagesLocationFacade;
use Bittacora\Tabs\Tabs;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\Console\Output\BufferedOutput;

class PostsCommand extends Command
{
    public $signature = 'posts:install';

    public $description = 'My command';

    public function handle(): void
    {
        $question= '¿Estás seguro de quedarte con la configuración por defecto? (si escribes "no" te publico el archivo de configuración, si escribes "yes" ejecuto el comando)';
        if ($this->confirm($question)){
            $this->comment('Registrando elementos del menú...');
            AdminMenuFacade::createGroup('contents','Contenidos','fa fa-file');
            $module = AdminMenuFacade::createModule('contents', 'posts', config('bpanel4-posts.name-module'), config('bpanel4-posts.icon'));
            AdminMenuFacade::createAction($module->key, 'Listar', 'index', 'fa fa-bars');
            AdminMenuFacade::createAction($module->key, 'Añadir', 'create', 'fa fa-plus');

            $this->comment('Hecho');

            $this->comment('Dando permisos al administrador...');
            $permissions = ['index', 'create', 'edit', 'destroy', 'store', 'update'];


            $adminRole = Role::findOrCreate('admin');
            foreach ($permissions as $permission) {
                $permission = Permission::firstOrCreate(['name' => 'posts.' . $permission]);
                $adminRole->givePermissionTo($permission);
            }

            Tabs::createItem('posts.index', 'posts.index', 'posts.index', config('bpanel4-posts.name-module'), config('bpanel4-posts.icon'));
            Tabs::createItem('posts.index', 'posts.create', 'posts.create', 'Añadir', 'fa fa-plus');
            Tabs::createItem('posts.create', 'posts.index', 'posts.index', config('bpanel4-posts.name-module'), config('bpanel4-posts.icon'));
            Tabs::createItem('posts.create', 'posts.create', 'posts.create', 'Añadir', 'fa fa-plus');
            Tabs::createItem('posts.edit', 'posts.index', 'posts.index', config('bpanel4-posts.name-module'), config('bpanel4-posts.icon'));
            Tabs::createItem('posts.edit', 'posts.create', 'posts.create', 'Añadir', 'fa fa-plus');

            ContentMultimediaImagesLocationFacade::createNewLocation('posts', 'Imagen destacada');
            ContentMultimediaImagesLocationFacade::createNewLocation('posts', 'Imagen social');
            //ContentMultimediaImagesLocationFacade::createNewLocation('posts', 'Imagen bloque');
            ContentMultimediaImagesLocationFacade::createNewLocation('posts', 'Galería');

            $this->comment('Hecho');
        }else{
            $output = new BufferedOutput();
            Artisan::call('vendor:publish --tag="posts-config"',[],$output);
            $result=$output->fetch();
            $this->comment($result);
            $this->info('Cambia las opciones y vuelve a ejecutar el comando escribiendo yes');
        }
    }
}
