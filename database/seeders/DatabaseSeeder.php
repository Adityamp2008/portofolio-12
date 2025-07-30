<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan seeder untuk users
        $this->call([
            UsersSeeder::class,
            // informasiSeeder::class,
        ]);
    }
}
