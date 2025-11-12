<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    /** @use HasFactory<\Database\Factories\PreguntaFactory> */
    use HasFactory;
    protected $table = 'preguntas';
    protected $fillable = [
        'texto',
        'bloque_id',
    ];
    public function bloque()
    {
        return $this->belongsTo(Bloque::class, 'bloque_id');
    }
}
