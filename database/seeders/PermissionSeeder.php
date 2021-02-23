<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleAppDashboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);
        Permission::updateOrCreate([
           'module_id' => $moduleAppDashboard->id,
           'name' => 'Access Dashboard',
           'slug' => 'app.dashboard'
        ]);


        $moduleAppRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
           'module_id' => $moduleAppRole->id,
           'name' => 'Access Role',
           'slug' => 'app.roles.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Create Role',
            'slug' => 'app.roles.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Edit Role',
            'slug' => 'app.roles.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Delete Role',
            'slug' => 'app.roles.destroy'
        ]);


        $userAppRole = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id' => $userAppRole->id,
            'name' => 'Access User',
            'slug' => 'app.users.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $userAppRole->id,
            'name' => 'Create User',
            'slug' => 'app.users.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $userAppRole->id,
            'name' => 'Edit User',
            'slug' => 'app.users.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $userAppRole->id,
            'name' => 'Delete User',
            'slug' => 'app.users.destroy'
        ]);

    }
}
