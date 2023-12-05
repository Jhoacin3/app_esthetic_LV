<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['tipo' => 'Corte de pelo', 'name' => 'Corte Básico', 'price' => 30.00],
            ['tipo' => 'Maquillaje', 'name' => 'Maquillaje de Fiesta', 'price' => 50.00],
            ['tipo' => 'Manicura', 'name' => 'Manicura Francesa', 'price' => 25.00],
        ];
        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }
    }
}
