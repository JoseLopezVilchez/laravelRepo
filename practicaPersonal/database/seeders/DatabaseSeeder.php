<?php

namespace Database\Seeders;

use App\Models\EjemploTenedor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void //OJO - este seeder es el que llena toda la aplicación, ergo todo el relleno que haya que crear debe ir aquí
    {
        EjemploTenedor::factory(1)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
