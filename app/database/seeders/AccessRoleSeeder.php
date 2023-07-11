<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AccessRoleSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionsWriter = [
            Permission::create(['name' => 'create posts', 'guard_name' => 'api']),
        ];

        /** @var Role $writeRole */
        $writeRole = Role::create(['name' => 'author', 'guard_name' => 'api']);

        foreach ($permissionsWriter as $permission) {
            $writeRole->givePermissionTo($permission);
        }

        Role::create(['name' => 'admin', 'guard_name' => 'web']);
    }

}
