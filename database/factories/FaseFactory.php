<?php

namespace Database\Factories;

use App\Models\Fase;
use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaseFactory extends Factory
{
    protected $model = Fase::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(3), // Nombre aleatorio
            'descripcion' => $this->faker->paragraph(), // Descripción aleatoria
            'proyecto_id' => Proyecto::inRandomOrder()->first()->id, // Selecciona un proyecto aleatorio
        ];
    }
}