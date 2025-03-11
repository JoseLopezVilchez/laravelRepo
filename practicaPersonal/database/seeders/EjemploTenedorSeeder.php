<?php

namespace Database\Seeders;

use App\Models\Ejemplo;
use App\Models\EjemploTenedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EjemploTenedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EjemploTenedor::factory(5)->has(Ejemplo::factory(5))->create(); //esto es una forma alternativa de lo hecho en EjemploTenedorFactory con afterCreating

        /*EjemploTenedor::factory()->create([
            'nombre' => 'tenedor'
        ]);*/
    }
}
