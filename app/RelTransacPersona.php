<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelTransacPersona extends Model
{

    protected $fillable =
    [
        'persona_id',
        'transaccion_id',
        'created_user_id'
    ];

    public function transacciones()
    {
        return $this->hasMany('App\Transaccion');
    }

    public function personas()
    {
        return $this->hasMany('App\Persona');
    }
}
