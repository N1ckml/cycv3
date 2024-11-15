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
        /*User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'), // Encripta la contraseña
            'user_type' => 1, // 1 = Admin
            'apellido' => 'GD',
            'dni' => '1',
            'celular' => '1',
        ]);

        // Crear un usuario normal
        User::factory()->create([
            'name' => 'Juan',
            'email' => 'juan@example.com',
            'password' => Hash::make('1234'), // Encripta la contraseña
            'user_type' => 2, // 2 = Usuario Normal
            'apellido' => 'Rivas',
            'dni' => '7283746',
            'celular' => '98273464',
        ]);
        User::factory()->create([
            'name' => 'Pedro',
            'email' => 'pedro@example.com',
            'password' => Hash::make('1234'), // Encripta la contraseña
            'user_type' => 2, // 2 = Usuario Normal
            'apellido' => 'Aguero',
            'dni' => '7777777',
            'celular' => '98888888',
        ]);*/
        $this->call(ProyectoSeeder::class);
    }
}
