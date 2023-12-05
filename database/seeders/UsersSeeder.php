<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('contraseña'),
                'remember_token' => \Str::random(10),
            ],
            [
                'name' => 'Usuario',
                'email' => 'usuario@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('contraseña'),
                'remember_token' => \Str::random(10),
            ],
        ];
        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
