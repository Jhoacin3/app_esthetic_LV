<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederTablaAgenda extends Seeder
{
    
    public function run(): void
    {
        // DATOS FALSOS PARA AGENDAS
        $faker = \Faker\Factory::create();
        $agenda = Agenda::create([
            'fullName' => 'Ana Maria Hernandez',
            'service' => 'Efecto Rimel',
            'day' => $faker->date,
            'hour' => $faker->time,
        ]);
        $agenda = Agenda::create([
            'fullName' => 'Ruth Martinez',
            'service' => 'Diseño de cejas',
            'day' => $faker->date,
            'hour' => $faker->time,
        ]);
        $agenda = Agenda::create([
            'fullName' => 'Veronica Cruz',
            'service' => 'Alaciado',
            'day' => $faker->date,
            'hour' => $faker->time,
        ]);
        $agenda = Agenda::create([
            'fullName' => 'Valeria Sanchez',
            'service' => 'Botox Capilar',
            'day' => $faker->date,
            'hour' => $faker->time,
        ]);
        $agenda = Agenda::create([
            'fullName' => 'Julisa Castellanos',
            'service' => 'Uñas',
            'day' => $faker->date,
            'hour' => $faker->time,
        ]);
        $agenda = Agenda::create([
            'fullName' => 'Adela Cruz Gomez',
            'service' => 'Maquillaje',
            'day' => $faker->date,
            'hour' => $faker->time,
        ]);
    }
}
