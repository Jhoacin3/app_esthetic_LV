<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;


class AppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointments = [
            ['name' => 'Maria', 'telefono' => '123456789', 'servicio' => 'Corte de cabello'],
            ['name' => 'Fernanda', 'telefono' => '987654321', 'servicio' => 'Maquillaje'],
            ['name' => 'Rosicarol', 'telefono' => '5551234567', 'servicio' => 'Manicura'],
            ['name' => 'Mariana', 'telefono' => '5559876543', 'servicio' => 'Pedicura'],
            ['name' => 'Jazmin', 'telefono' => '5551112233', 'servicio' => 'Tratamiento facial'],
            ['name' => 'Angelina', 'telefono' => '5553334444', 'servicio' => 'Depilación'],
            ['name' => 'Jessica', 'telefono' => '5555555555', 'servicio' => 'Masaje'],
            ['name' => 'Alondra', 'telefono' => '5556667777', 'servicio' => 'Tinte de cabello'],
            ['name' => 'Daniela', 'telefono' => '5558889999', 'servicio' => 'Peinado'],
            ['name' => 'Karla', 'telefono' => '5550001111', 'servicio' => 'Tratamiento capilar'],
        ];

        foreach ($appointments as $appointmentData) {
            Appointment::create($appointmentData);
        }
    }
}
