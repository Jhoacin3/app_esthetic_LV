<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            ['name' => 'Admin', 'guard_name' => 'web'],
            ['name' => 'User', 'guard_name' => 'web'],
        ];
            // create roles 
        /*$admin = Role::create(['name' => 'admin']);
        $employee = Role::create(['name' => 'employee']);*/

            // create permissions
        Permission::create(['name' => 'ver-appointment']);
        Permission::create(['name' => 'crear-appointment']);
        Permission::create(['name' => 'editar-appointment']);
        Permission::create(['name' => 'borrar-appointment']);
        
        // assign permissions to roles
        $admin->givePermissionTo('ver-appointment');
        $admin->givePermissionTo('crear-appointment');
        $admin->givePermissionTo('editar-appointment'); 
        $admin->givePermissionTo('borrar-appointment');

        $employee->givePermissionTo('ver-appointment');
        $employee->givePermissionTo('crear-appointment');

        
        foreach ($roles as $roleData) {
            Role::create($roleData);
        }
    }
}
