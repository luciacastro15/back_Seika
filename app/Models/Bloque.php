<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    /** @use HasFactory<\Database\Factories\BloqueFactory> */
    use HasFactory;
    protected $table = 'bloques';
    protected $fillable = [
        'nombre',
    ];
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'bloque_id');
    }
}
