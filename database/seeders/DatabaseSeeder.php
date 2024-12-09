<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SessionExamenSeeder::class,
            ExamenSeeder::class,
            SurveillantSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
