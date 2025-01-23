<?php

namespace Database\Seeders;

use App\Models\Commande;
use Illuminate\Database\Seeder;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commandes = [
            [
                'n_depot' => 'DEP001',
                'produit' => 'Ordinateur portable',
                'quantite' => 50,
                'date_livraison' => '2024-03-25',
            ],
            [
                'n_depot' => 'DEP002',
                'produit' => 'Imprimante laser',
                'quantite' => 20,
                'date_livraison' => '2024-03-26',
            ],
            [
                'n_depot' => 'DEP003',
                'produit' => 'Écran 27 pouces',
                'quantite' => 30,
                'date_livraison' => '2024-03-27',
            ],
            [
                'n_depot' => 'DEP004',
                'produit' => 'Clavier mécanique',
                'quantite' => 100,
                'date_livraison' => '2024-03-28',
            ],
            [
                'n_depot' => 'DEP005',
                'produit' => 'Souris sans fil',
                'quantite' => 150,
                'date_livraison' => '2024-03-29',
            ],
        ];

        foreach ($commandes as $commande) {
            Commande::create($commande);
        }
    }
}
