<?php

namespace Bittacora\CourseInscriptions\Commands;

use Bittacora\AdminMenu\AdminMenuFacade;
use Bittacora\Tabs\Tabs;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CourseInscriptionsCommand extends Command
{
    public $signature = 'course-inscriptions:install';

    public $description = 'My command';

    public function handle(): void
    {
        $this->comment('Registrando elementos del menú...');
        AdminMenuFacade::createAction('courses', 'Inscritos', 'course-inscriptions.index', 'fa fa-file-alt');

        $this->comment('Hecho');

        $this->comment('Dando permisos al administrador...');
        $permissions = ['index', 'edit', 'update', 'destroy'];


        $adminRole = Role::findOrCreate('admin');
        foreach ($permissions as $permission) {
            $permission = Permission::firstOrCreate(['name' => 'courses.course-inscriptions.' . $permission]);
            $adminRole->givePermissionTo($permission);
        }

        Tabs::createItem('courses.course-inscriptions.index', 'courses.course-inscriptions.index', 'courses.course-inscriptions.index', 'Inscripciones', 'fa fa-file-alt');
        Tabs::createItem('courses.course-inscriptions.index', 'courses.index', 'courses.index', 'Cursos', 'fa fa-graduation-cap');

        $this->comment('Hecho');
    }
}
