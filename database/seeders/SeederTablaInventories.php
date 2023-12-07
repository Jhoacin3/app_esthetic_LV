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

        $inventory = Inventory::create([
            'name' => 'Depiladoras láser o IPL',
            'description' => 'Estas herramientas se utilizan para dañar el folículo piloso y reducir el crecimiento del vello con el tiempo.',
            'quantity' => $faker->randomFloat(2, 10, 100), // Usando $faker para generar datos falsos
        ]);
        $inventory = Inventory::create([
            'name' => 'Microdermoabrasión',
            'description' => 'La microdermoabrasión utiliza un dispositivo que exfolia suavemente la capa externa de la piel, mejorando la textura y el tono de la piel',
            'quantity' => $faker->randomFloat(2, 10, 100), // Usando $faker para generar datos falsos
        ]);
        $inventory = Inventory::create([
            'name' => 'Equipos de manicura y pedicura',
            'description' => 'ncluyen limas, pulidores, cortaúñas eléctricos y otros instrumentos para manicuras y pedicuras profesionales.',
            'quantity' => $faker->randomFloat(2, 10, 100), // Usando $faker para generar datos falsos
        ]);
        $inventory = Inventory::create([
            'name' => 'Equipos de cuidado facial',
            'description' => 'Incluyen vaporizadores faciales, extractores de comedones, máquinas de alta frecuencia.',
            'quantity' => $faker->randomFloat(2, 10, 100), // Usando $faker para generar datos falsos
        ]);
        $inventory = Inventory::create([
            'name' => 'Lámparas de luz LED',
            'description' => ' Estas lámparas emiten luz de diferentes colores para abordar problemas de la piel, como el acné o el envejecimiento.',
            'quantity' => $faker->randomFloat(2, 10, 100), // Usando $faker para generar datos falsos
        ]);
        $inventory = Inventory::create([
            'name' => 'Equipos de cavitación y radiofrecuencia',
            'description' => 'Estos dispositivos utilizan ondas ultrasónicas o radiofrecuencia para reducir la grasa localizada y mejorar la apariencia de la piel en áreas específicas del cuerpo',
            'quantity' => $faker->randomFloat(2, 10, 100), // Usando $faker para generar datos falsos
        ]);
    }
}
