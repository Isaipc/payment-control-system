<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    public const EMPLEADOS = 'Empleados';
    public const CLIENTES = 'Clientes';

    protected $fillable =
    [
        'nombre',
        'created_user_id',
        'updated_user_id'
    ];

    protected function subcategorias()
    {
        return $this->hasMany('App\Subcategoria');
    }
}
