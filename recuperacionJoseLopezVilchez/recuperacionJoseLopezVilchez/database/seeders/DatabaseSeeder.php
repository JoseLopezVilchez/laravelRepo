<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();//lo dejo comentado porque no necesito 10 usuarios ahora mismo - por tanto, solo he ejecutado el seeder de abajo

        User::factory()->create([
            'name' => 'Estech',
            'email' => 'test@escuelaestech.es',
        ]);
    }
}
