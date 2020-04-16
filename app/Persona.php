<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable =
    [
        'rfc',
        'nombre',
        'apellidos',
        'telefono',
        'direccion',
        'hora_entrada',
        'hora_salida',
        'nacimiento',
        'pago_fijo',
        'subcategoria_id',
        'created_user_id',
        'updated_user_id',
    ];

    public function subcategoria()
    {
        return $this->belongsTo('App\Subcategoria');
    }
}
