<?php

/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 20.08.2017
 * Time: 14:31
 */

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $permissions_seed = config('roles');

        foreach ($permissions_seed as $role_name => $permissions_raw) {

            $role = Role::create([
                'name' => $role_name
            ]);

            foreach ($permissions_raw as $permission_raw) {
                $permission = Permission::create([
                    'name' => $permission_raw['name'],
                ]);

                // Assign permission to role
                $role->givePermissionTo($permission);
            }
        }
    }
}