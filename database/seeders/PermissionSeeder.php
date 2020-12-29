<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-update',
            'user-delete',
            'role-list',
            'role-create',
            'role-update',
            'role-delete',
            'banner-list',
            'banner-create',
            'banner-update',
            'banner-delete',
            'room-list',
            'room-create',
            'room-update',
            'room-delete',
            'facility-list',
            'facility-create',
            'facility-update',
            'facility-delete',
            'type-list',
            'type-create',
            'type-update',
            'type-delete',
            'attribute-list',
            'attribute-create',
            'attribute-update',
            'coupon-list',
            'coupon-create',
            'coupon-update',
            'coupon-delete',
            'setting-manage'
        ];
        $role = Role::where('name', 'super_admin')->first();

        foreach ($permissions as $permission) {
            $permission = Permission::create(['name' => $permission]);
            $permission->assignRole($role);
        }
    }
}
