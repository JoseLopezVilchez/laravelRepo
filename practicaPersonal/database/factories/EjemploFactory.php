<?php

namespace Database\Factories;

use App\Models\Ejemplo;
use App\Models\EjemploTenedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ejemplo>
 */
class EjemploFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(), //fake() permite usar métodos de la librería Faker de php para generar datos aleatorios
            'descripcion' => fake()->text(),
            'tenedor_id' => EjemploTenedor::factory() // Crea automáticamente un usuario si no se proporciona
        ];
    }
}
