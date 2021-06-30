<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Publisher']);
        $role3 = Role::create(['name' => 'Suscriber']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.marcas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.productos'])->syncRoles([$role1, $role2]);
    }
}
