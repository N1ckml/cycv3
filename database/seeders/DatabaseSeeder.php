<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear un usuario administrador
        User::factory()->create([
            'name' => 'Andres',
            'email' => 'bcruzandresjesu@gmail.com',
            'password' => Hash::make('29dejunio'), // Encripta la contraseña
            'user_type' => 1, // 1 = Admin
        ]);

        // Crear un usuario normal
        User::factory()->create([
            'name' => 'Juan',
            'email' => 'juan@example.com',
            'password' => Hash::make('contrasenia123'), // Encripta la contraseña
            'user_type' => 2, // 2 = Usuario Normal
        ]);
    }
}
