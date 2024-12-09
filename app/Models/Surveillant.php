<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveillant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' ,
        'examen_id' ,

    ];
    public function examen()
    {
        return $this->belongsTo(Examen::class, 'examen_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
