<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Créer la permission "view dashboard"
        $permission = Permission::create(['name' => 'view dashboard']);

        // Créer le rôle "admin"
        $role = Role::create(['name' => 'admin']);

        // Assigner la permission au rôle
        $role->givePermissionTo($permission);

        // Assigner le rôle admin à l'utilisateur admin
        $admin = User::where('email', 'admin@example.com')->first();
        if ($admin) {
            $admin->assignRole('admin');
        }
    }
}
