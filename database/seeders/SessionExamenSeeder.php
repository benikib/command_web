<?php

namespace Database\Seeders;

use App\Models\SessionExamen;
use Illuminate\Database\Seeder;

class SessionExamenSeeder extends Seeder
{
    public function run()
    {
        $sessions = [
            [
                'intitule' => 'Session Ordinaire',
                'promotion' => 'L1',
                'mention' => 'Informatique',
                'semestre' => 'S1',
                'an_academique' => '2023-2024',
            ],
            [
                'intitule' => 'Session Rattrapage',
                'promotion' => 'L2',
                'mention' => 'Informatique',
                'semestre' => 'S3',
                'an_academique' => '2023-2024',
            ],
            [
                'intitule' => 'Session Ordinaire',
                'promotion' => 'L3',
                'mention' => 'Mathématiques',
                'semestre' => 'S5',
                'an_academique' => '2023-2024',
            ],
        ];

        foreach ($sessions as $session) {
            SessionExamen::create($session);
        }
    }
}
