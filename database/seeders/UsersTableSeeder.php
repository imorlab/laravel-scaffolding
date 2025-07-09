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
        // Crear usuario administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        // Crear usuarios de prueba
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name' => 'Usuario ' . $i,
                'email' => 'usuario' . $i . '@example.com',
                'email_verified_at' => $i % 2 === 0 ? now() : null,
                'password' => Hash::make('password'),
            ]);
        }
    }
}
