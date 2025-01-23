<?php

namespace Database\Seeders;

use App\Models\Examen;
use Illuminate\Database\Seeder;

class ExamenSeeder extends Seeder
{
    public function run()
    {
        $examens = [
            [
                'intitule' => 'Mathématiques',
                'professeur' => 'Dr. Smith',
                'n_local' => 2,
                'date' => '2024-03-15',
                'heure' => '09:00',
                'session_examens_id' => 1,
            ],
            [
                'intitule' => 'Programmation',
                'professeur' => 'Dr. Johnson',
                'n_local' => 2,
                'date' => '2024-03-16',
                'heure' => '14:00',
                'session_examens_id' => 1,
            ],
            [
                'intitule' => 'Base de données',
                'professeur' => 'Dr. Williams',
                'n_local' => 2,
                'date' => '2024-03-17',
                'heure' => '10:00',
                'session_examens_id' => 2,
            ],
        ];

        foreach ($examens as $examen) {
            Examen::create($examen);
        }
    }
}
