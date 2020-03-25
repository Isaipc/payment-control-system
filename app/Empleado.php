<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable =
    [
        'nombre',
        'apellidos',
        'telefono',
        'direccion',
        'rfc',
        'hora_entrada',
        'hora_salida',
        'nacimiento'
    ];
}
