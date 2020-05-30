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
        'puesto',
        'hora_entrada',
        'hora_salida',
        'nacimiento',
        'pago_fijo',
        'categoria_id',
        'created_user_id',
        'updated_user_id',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function created_user()
    {
        return $this->belongsTo('App\User', 'created_user_id', 'id');
    }

    public function updated_user()
    {
        return $this->belongsTo('App\User', 'updated_user_id', 'id');
    }
}
