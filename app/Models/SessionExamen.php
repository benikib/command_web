<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionExamen extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitule',
        'an_academique',
        'promotion',
        'semestre',
        'mention'
    ];

    // Ajout de la relation avec User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec les examens
    public function examens()
    {
        return $this->hasMany(Examen::class, 'session_examens_id');
    }
}
