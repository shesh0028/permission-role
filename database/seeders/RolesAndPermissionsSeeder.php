<?php

// database/seeders/RolesAndPermissionsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create Permissions
        Permission::create(['name' => 'can_create']);
        Permission::create(['name' => 'can_edit']);
        Permission::create(['name' => 'can_update']);
        Permission::create(['name' => 'can_delete']);
        Permission::create(['name' => 'can_view']);

        // Create Roles
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        // Assign permissions to the admin role
        $admin->givePermissionTo(['can_create', 'can_edit', 'can_update', 'can_delete', 'can_view']);

        // Assign specific permissions to the user role
        $user->givePermissionTo(['can_view']);
    }
}

