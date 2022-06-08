<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'super-admin'
            ], [
                'name' => 'admin', 'permissions' => [
                    ['user', 'module' => 'administration', 'action' => ['view', 'add', 'update', 'delete', 'activate', 'deactivate']],
                    ['role', 'module' => 'administration', 'action' => ['view', 'add', 'update', 'delete', 'activate', 'deactivate', 'grant-permission']],
                ]
            ], [
                'name' => 'student', 'permissions' => [
                ]
            ], [
                'name' => 'lecturer', 'permissions' => [
                    ['course-management', 'module' => 'lecturer', 'action' => ['view', 'enroll']],
                    ['attendance-take', 'module' => 'lecturer', 'action' => ['class', 'exam']],
                ]
            ], [
                'name' => 'exam', 'permissions' => [
                ]
            ], [
                'permissions' => [
                    // ['personal-information', 'action' => ['update', 'create', 'complete']],
                ]
            ]
        ];


        foreach ($roles as $role) {
            if (isset($role['name'])) { // if role is found create it
                $roleInstance = Role::firstOrCreate([
                    'name' => $role['name']
                ]);
                echo "Role $roleInstance->name  created \n";
            }

            foreach ($role['permissions']??[] as $permission) {
                foreach ($permission['action'] as $action) {
                    $permissionInstance = Permission::firstOrCreate(['name' => $permission[0].'-'.$action, 'module' => $permission['module']]);
                    echo "Permission $permissionInstance->name  created \n";
                    if (isset($role['name'])) { // if role was created give permissions to that role
                        $roleInstance->givePermissionTo($permissionInstance->name);
                    }
                }
            }
        }
    }
}
