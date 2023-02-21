<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  Create roles
        $roleSuperAdmin = Role::create([
            'name' => 'Admin',
            'description' => 'Any of the activities taken can be accessed by the administrator.',
        ]);

        //  permission List as array
        $admin_permissions = [

            // admin dashboard
            [
                'group_name' => 'roles',
                'permissions' => [
                    'roles.view',
                    'roles.add',
                    'roles.edit',
                    'roles.delete',
                ],
            ],
            [
                'group_name' => 'language',
                'permissions' => [
                    'language.view',
                    'language.add',
                    'language.edit',
                    'language.delete',
                ],
            ],
            [
                'group_name' => 'users',
                'permissions' => [
                    'users.view',
                    'users.add',
                    'users.edit',
                    'users.delete',
                ],
            ],
            [
                'group_name' => 'event',
                'permissions' => [
                    'event.view',
                    'event.add',
                    'event.edit',
                    'event.delete',
                ],
            ],
        ];

        // Assign Admin Permission
        for ($i = 0; $i < count($admin_permissions); $i++) {
            $permissionGroup = $admin_permissions[$i]['group_name'];

            for ($j = 0; $j < count($admin_permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create([
                    'name' => $admin_permissions[$i]['permissions'][$j],
                    'group_name' => $permissionGroup,
                ]);

                $roleSuperAdmin->givePermissionTo($permission);
            }
        }
    }
}
