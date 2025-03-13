<?php

namespace Database\Factories;

use App\Models\Ejemplo;
use App\Models\EjemploTenedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EjemploTenedor>
 */
class EjemploTenedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name()
        ];
    }

    public function configure() { //es posible hacer que por cada elemento creado se creen otros
        return $this->afterCreating(function (EjemploTenedor $tenedor) {
            Ejemplo::factory(2)->create(['tenedor_id' => $tenedor->id]);
        });
    }
}
