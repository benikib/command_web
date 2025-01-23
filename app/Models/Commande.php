<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_depot',
        'produit',
        'quantite',
        'date_livraison'
    ];

    protected $casts = [
        'date_livraison' => 'date'
    ];
}
