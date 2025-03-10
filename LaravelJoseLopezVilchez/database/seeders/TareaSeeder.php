<?php

namespace Database\Seeders;

use App\Models\Tarea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        Crear un Seeder que creará un número aleatorio de tareas (entre 1 y 10) para cada usuario. (10 ptos)
        */
        Tarea::factory(rand(1, 10))->create();
    }
}
