<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    /** @use HasFactory<\Database\Factories\RespuestaFactory> */
    use HasFactory;
    protected $table = 'respuestas';
    protected $fillable = [
        'pregunta_id',
        'auditoria_id',
        'respuesta_texto',
        'comentario',
    ];
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }
    public function auditoria()
    {
        return $this->belongsTo(Auditoria::class, 'auditoria_id');
    }
}
