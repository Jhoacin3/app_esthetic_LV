<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederTablaServices extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create(); // Importando el generador de datos Faker

        $service = Service::create([
            'name' => 'Efecto Rimel',
            'description' => 'En nuestra sección especializada en efecto rímel, nos complace ofrecerte una experiencia única y personalizada para realzar la belleza de tus pestañas y resaltar tu mirada.
            ',
            'price' => 300,
        ]);
        $service = Service::create([
            'name' => 'Diseño de cejas',
            'description' => 'En nuestro apartado especializado en diseño de cejas, nos complace ofrecerte una experiencia única y personalizada para realzar la belleza de tu mirada.
            ',
            'price' => '200',
        ]);
        $service = Service::create([
            'name' => 'Alaciado',
            'description' => 'En nuestra sección especializada en alaciado capilar, nos complace ofrecerte una experiencia única y personalizada para lograr un cabello liso y manejable.
            ',
            'price' => '190',
        ]);
        $service = Service::create([
            'name' => 'Botox Capilar',
            'description' => 'En nuestra sección especializada en botox capilar, nos complace ofrecerte una experiencia única y personalizada para revitalizar y nutrir tu cabello desde adentro.
            ',
            'price' => '500',
        ]);
        $service = Service::create([
            'name' => 'Uñas',
            'description' => 'En nuestro apartado dedicado a las uñas, nos complace ofrecerte una experiencia única y personalizada para realzar la belleza de tus manos.
            ',
            'price' => '150',
        ]);
        $service = Service::create([
            'name' => 'Maquillaje',
            'description' => 'En nuestra sección especializada en maquillaje, nos complace ofrecerte una experiencia única y personalizada para realzar tu belleza natural.
            ',
            'price' => '200',
        ]);
    }
}
