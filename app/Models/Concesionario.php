<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concesionario extends Model
{
    /** @use HasFactory<\Database\Factories\ConcesionarioFactory> */
    use HasFactory;
    protected $table = 'concesionarios';
    protected $fillable = [
        'nombre',
        'ubicacion',
        'telefono',
        'marca',
        'jefe_id',
    ];
    public function jefe()
    {
        return $this->belongsTo(Usuario::class, 'jefe_id');
    }
}
