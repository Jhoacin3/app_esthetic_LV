<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;
use Illuminate\Support\Str;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'name' => 'Usuario1',
                'email' => 'usuario1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('contraseña'),
                'remember_token' => \Str::random(10),
                'notification' => 1,
            ],
            [
                'name' => 'Usuario2',
                'email' => 'usuario2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('contraseña'),
                'remember_token' => \Str::random(10),
                'notification' => 0,
            ],
            [
                'name' => 'Usuario3',
                'email' => 'usuario3@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('contraseña'),
                'remember_token' => \Str::random(10),
                'notification' => 0,
            ],
            [
                'name' => 'Usuario4',
                'email' => 'usuario4@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('contraseña'),
                'remember_token' => \Str::random(10),
                'notification' => 0,
            ],
            [
                'name' => 'Usuario5',
                'email' => 'usuario5@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('contraseña'),
                'remember_token' => \Str::random(10),
                'notification' => 1,
            ],
        ];
        
        foreach ($clients as $clientData) {
            Client::create($clientData);
        }
        
    }
}
