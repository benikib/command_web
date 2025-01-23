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
        $this->call([
            UserSeeder::class,
            SessionExamenSeeder::class,
            ExamenSeeder::class,
            SurveillantSeeder::class,
            AdminSeeder::class,
            CommandeSeeder::class,
        ]);
    }
}
