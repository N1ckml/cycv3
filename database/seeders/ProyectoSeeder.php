<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Hash;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario para asociar al proyecto
        $user = User::create([
            'name' => 'Usuario Prueba',
            'apellido' => 'Apellido Prueba',
            'dni' => '12345678',
            'celular' => '912345678',
            'email' => 'usuario@prueba.com',
            'password' => Hash::make('password'), // Hashear la contraseña
            'user_type' => 2, // Usuario normal
        ]);

        // Definir los íconos SVG por prioridad
        $svgIcons = [
            'alta' => '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FF0000"><path d="M480-120q-33 0-56.5-23.5T400-200q0-33 23.5-56.5T480-280q33 0 56.5 23.5T560-200q0 33-23.5 56.5T480-120Zm-80-240v-480h160v480H400Z"/></svg>',
            'media' => '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFA500"><path d="M480-120q-33 0-56.5-23.5T400-200q0-33 23.5-56.5T480-280q33 0 56.5 23.5T560-200q0 33-23.5 56.5T480-120Zm-80-240v-480h160v480H400Z"/></svg>',
            'baja' => '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#00FF00"><path d="M480-120q-33 0-56.5-23.5T400-200q0-33 23.5-56.5T480-280q33 0 56.5 23.5T560-200q0 33-23.5 56.5T480-120Zm-80-240v-480h160v480H400Z"/></svg>',
        ];

        // Crear proyectos asociados a este usuario con diferentes prioridades
        Proyecto::create([
            'nombre' => 'Proyecto A',
            'descripcion' => 'Descripción del proyecto A',
            'icono' => $svgIcons['alta'], // Asigna el ícono de prioridad "alta"
            'user_id' => $user->id,
        ]);

        Proyecto::create([
            'nombre' => 'Proyecto B',
            'descripcion' => 'Descripción del proyecto B',
            'icono' => $svgIcons['media'], // Asigna el ícono de prioridad "media"
            'user_id' => $user->id,
        ]);

        Proyecto::create([
            'nombre' => 'Proyecto C',
            'descripcion' => 'Descripción del proyecto C',
            'icono' => $svgIcons['baja'], // Asigna el ícono de prioridad "baja"
            'user_id' => $user->id,
        ]);
    }
}
