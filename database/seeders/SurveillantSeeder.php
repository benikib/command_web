<?php

namespace Database\Seeders;

use App\Models\Surveillant;
use Illuminate\Database\Seeder;

class SurveillantSeeder extends Seeder
{
    public function run()
    {
        $surveillants = [
            // Surveillant 1 - plusieurs examens
            [
                'user_id' => 2,
                'examen_id' => 1,
                'participer' => false,
                'local' => 'A101',
            ],
            [
                'user_id' => 2,
                'examen_id' => 2,
                'participer' => false,
                'local' => 'B202',
            ],
            [
                'user_id' => 2,
                'examen_id' => 3,
                'participer' => false,
                'local' => 'C303',
            ],
            // Surveillant 2 - autres examens
            [
                'user_id' => 3,
                'examen_id' => 1,
                'participer' => false,
                'local' => 'A102',
            ],
            [
                'user_id' => 3,
                'examen_id' => 3,
                'participer' => false,
                'local' => 'C304',
            ],
            // Surveillant 3
            [
                'user_id' => 4,
                'examen_id' => 2,
                'participer' => false,
                'local' => 'B203',
            ],
        ];

        foreach ($surveillants as $surveillant) {
            Surveillant::create($surveillant);
        }
    }
}
