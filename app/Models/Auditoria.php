<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    /** @use HasFactory<\Database\Factories\AuditoriaFactory> */
    use HasFactory;
    //indica la tabla asociada al modelo
    protected $table = 'auditorias';
    //campos que se pueden asignar a la hora de crear una auditoria
    protected $fillable = [
        'auditor_id',
        'concesionario_id',
        'jefe_id',
    ];
    public function auditor()
    {
        return $this->belongsTo(Usuario::class, 'auditor_id');
    }
    public function jefe()
    {
        return $this->belongsTo(Usuario::class, 'jefe_id');
    }
    public function concesionario()
    {
        return $this->belongsTo(Concesionario::class, 'concesionario_id');
    }
    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'auditoria_id');
    }   
}
