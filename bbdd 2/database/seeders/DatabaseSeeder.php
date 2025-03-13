<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // UserSeeder::class,
            //Otros seeders adicionales
            PostSeeder::class,
        ]);
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}



/*
Tabla posts
id      tipo unsigned big integer   primary
title   tipo string   length 100  unico
content tipo text     nullable
user_id tipo unsigned big integer (foreign 'user_id' referencia users->id)

*/