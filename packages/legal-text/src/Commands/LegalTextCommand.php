<?php

namespace Bittacora\LegalText\Commands;

use Bittacora\AdminMenu\AdminMenuFacade;
use Bittacora\LegalText\Models\LegalText;
use Bittacora\Tabs\Tabs;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\Console\Output\BufferedOutput;

class LegalTextCommand extends Command
{
    public $signature = 'legal-text:install';

    public $description = 'My command';

    public function handle(): void
    {
        $this->comment('Registrando elementos del menú...');
        AdminMenuFacade::createGroup('contents','Contenidos','fa fa-file');
        $module = AdminMenuFacade::createModule('contents', 'legal-text', 'Términos legales', 'fa fa-file-contract');
        AdminMenuFacade::createAction($module->key, 'Listar', 'index', 'fa fa-bars');
        AdminMenuFacade::createAction($module->key, 'Añadir', 'create', 'fa fa-plus');

        $this->comment('Hecho');

        $this->comment('Dando permisos al administrador...');
        $permissions = ['index', 'create', 'edit', 'destroy', 'store', 'update'];


        $adminRole = Role::findOrCreate('admin');
        foreach ($permissions as $permission) {
            $permission = Permission::firstOrCreate(['name' => 'legal-text.' . $permission]);
            $adminRole->givePermissionTo($permission);
        }

        Tabs::createItem('legal-text.index', 'legal-text.index', 'legal-text.index', 'Términos legales', 'fa fa-file');
        Tabs::createItem('legal-text.index', 'legal-text.create', 'legal-text.create', 'Añadir', 'fa fa-plus');
        Tabs::createItem('legal-text.create', 'legal-text.index', 'legal-text.index', 'Términos legales', 'fa fa-file');
        Tabs::createItem('legal-text.create', 'legal-text.create', 'legal-text.create', 'Añadir', 'fa fa-plus');
        Tabs::createItem('legal-text.edit', 'legal-text.index', 'legal-text.index', 'Términos legales', 'fa fa-file');
        Tabs::createItem('legal-text.edit', 'legal-text.create', 'legal-text.create', 'Añadir', 'fa fa-plus');
        $this->comment('Hecho');
        $this->comment('Creando páginas legales...');
        LegalText::create([
            'title' => 'Aviso legal',
            'slug' => 'aviso-legal',
            'meta_title' => 'Aviso legal',
            'meta_description' => '',
            'meta_keywords' => '',
            'active' => 1,
        ]);

        LegalText::create([
            'title' => 'Política de Cookies',
            'slug' => 'politica-de-cookies',
            'meta_title' => 'Política de Cookies',
            'meta_description' => '',
            'meta_keywords' => '',
            'active' => 1,
        ]);

        LegalText::create([
            'title' => 'Política de privacidad',
            'slug' => 'politica-de-privacidad',
            'meta_title' => 'Política de privacidad',
            'meta_description' => '',
            'meta_keywords' => '',
            'active' => 1,
        ]);
        $this->comment('Hecho');
    }
}
