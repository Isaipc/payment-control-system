<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    public const EMPLEADOS = 'Empleados';
    public const CLIENTES = 'Clientes';

    public const CATEGORIAS = array(
        1 => self::EMPLEADOS,
        2 => self::CLIENTES
    );

    protected $fillable =
    [
        'nombre',
        'created_user_id',
        'updated_user_id'
    ];

    public function personas()
    {
        return $this->hasMany('App\Persona');
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
