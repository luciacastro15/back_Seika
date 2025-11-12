<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
//contacto directo con la bbdd
class Usuario extends Authenticatable
    //este modelo nos da metodos de autenticación(crear usuarios, tokens, verificar contraseñas, etc)
{
    /** @use HasFactory<\Database\Factories\UsuarioFactory> */
    use HasFactory, HasApiTokens;
    protected $table = 'usuarios';
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol_id',
    ];
    //para coger los roles de la bbdd
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
    public function getRolNombreAttribute()
    {
        return $this->rol ? $this->rol->nombre : null;
        //? es como un if ternario: si el usuario tiene rol, devuelve el nombre del rol, si no, devuelve null
    }
}
