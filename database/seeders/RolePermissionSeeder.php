<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Buat permissions
        $permissions = ['view products', 'edit products', 'delete products', 'view orders', 'manage users'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Buat role dan assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($permissions);

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo(['view products']);
    }
}
