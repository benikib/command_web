<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pv extends Model
{
    use HasFactory;

    protected $fillable = [
        'local',
        'dure',
        'hcom',
        'hfin',
        'agents',
        'hdebut',
        'hcloture',
        'n_etudiants_enregistre',
        'n_depot',
        'description',
        'examen_id'
    ];

    // Définition de la relation avec Examen
    public function examen()
    {
        return $this->belongsTo(Examen::class, 'examen_id');
    }

    // Si vous utilisez le champ agents comme JSON
    protected $casts = [
        'agents' => 'array'
    ];
}
