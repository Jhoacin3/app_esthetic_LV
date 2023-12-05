<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla blogs
            'ver-services',
            'crear-services',
            'editar-services',
            'borrar-services',
            //Operacions sobre tabla inventories
            'ver-inventory',
            'crear-inventory',
            'editar-inventory',
            'borrar-inventory',
            //Operacions sobre tabla inventories
            'ver-agenda',
            'crear-agenda',
            'editar-agenda',
            'borrar-agenda'
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
