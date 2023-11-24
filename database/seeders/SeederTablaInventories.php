<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SeederTablaInventories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create(); // Importando el generador de datos Faker

        // $inventory1 = Inventory::create([
        //     'name' => 'Escoba',
        //     'description' => 'Para el negocio',
        //     'quantity' => $faker->randomFloat(2, 10, 100), // Usando $faker para generar datos falsos
        // ]);
        $inventory2 = Inventory::create([
            'name' => 'Maquina pal pelo',
            'description' => 'Para tostar el pelo muajaja',
            'quantity' => $faker->randomFloat(2, 10, 100), // Usando $faker para generar datos falsos
        ]);
    }
}
