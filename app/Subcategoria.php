<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{

    public const EMPLEADOS = array(
        'Administrador',
        'Entrenador',
        'Alberquero',
        'Desarrollador'
    );

    public const CLIENTES = array(
        'Cliente'
    );

    protected $fillable =
    [
        'nombre',
        'categoria_id',
        'created_user_id',
        'updated_user_id'
    ];

    public function personas()
    {
        return $this->hasMany('App\Persona');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
