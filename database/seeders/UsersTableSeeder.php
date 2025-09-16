<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario administrador solo si no existe
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrador',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
        );

        // Crear usuarios de prueba solo si no existen
        for ($i = 1; $i <= 20; $i++) {
            User::firstOrCreate(
                ['email' => 'usuario' . $i . '@example.com'],
                [
                    'name' => 'Usuario ' . $i,
                    'email_verified_at' => $i % 2 === 0 ? now() : null,
                    'password' => Hash::make('password'),
                ]
            );
        }
    }
}
