<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Créer un admin par défaut
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'grade' => 'Professeur',
            'filiere' => 'Informatique',
        ]);

        // Liste des grades possibles
        $grades = [
            'Professeur',
            'Assistant',
            'Chef de Travaux',
            'Chargé de TD',
        ];

        // Liste des filières
        $filieres = [
            'Informatique',
            'Mathématiques',
            'Physique',
            'Chimie',
            'Biologie',
        ];

        // Créer 10 utilisateurs normaux
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'grade' => $grades[array_rand($grades)],
                'filiere' => $filieres[array_rand($filieres)],
                'email_verified_at' => now(),
            ]);
        }
    }
}
