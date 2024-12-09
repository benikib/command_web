<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    protected $fillable = [
        'intitule' ,
        'professeur' ,
        'n_local' ,
        'date',
        'heure',
        'session_examens_id',
    ];
    public function sessionExamen()
    {
        return $this->belongsTo(SessionExamen::class, 'session_examens_id');
    }

    public function surveillants()
    {
        return $this->hasMany(Surveillant::class);
    }

    public function pvs()
    {
        return $this->hasMany(Pv::class, 'examen_id');
    }
}
