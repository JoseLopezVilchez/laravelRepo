<?php

namespace Database\Factories;

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
            'descripcion' => fake()->text()
            //'user_id' => User::factory(), // Crea automáticamente un usuario si no se proporciona
        ];
    }

    /*public function configure() { //es posible hacer el tema a la inversa, y que por cada elemento creado se creen otros
        return $this->afterCreating(function (User $user) {
            Post::factory(10)->create(['user_id' => $user->id]); //
        });
    }*/
}
