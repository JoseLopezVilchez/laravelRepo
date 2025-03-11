<?php

namespace Database\Seeders;

use App\Models\Ejemplo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EjemploSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        
        Ejemplo::factory(10)->create();

        //Ejemplo::factory(10)->has(User::factory(10))->create(); //esto es una forma alternativa de lo hecho en EjemploFactory con afterCreating

        Ejemplo::factory()->create([
            'nombre' => 'ejemplo',
            'descripcion' => 'esto es una descripcion del ejemplo'
        ]);
    }
}
