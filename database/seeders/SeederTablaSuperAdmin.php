<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class SeederTablaSuperAdmin extends Seeder
{
    
    public function run(): void
    {
        $usuario = User::create([
            'name'=>'Carolina millares romero',
            'email'=>'admin@gmail.com',
            'password' => bcrypt('admin@pass'),
        ]);
        $rol = Role::create(['name'=>'Administrador']);
        $permisos = Permission::pluck('id', 'id')->all();
        $rol->syncPermissions($permisos);
        $usuario->assignRole([$rol->id]);
        // ojo, en caso de que ya este el rol administrador Y COMENTAMOS LOS CUATRO DE ARRIBA
        // $usuario->assignRole('Administrador');
    }
}
