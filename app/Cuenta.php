<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $fillable =
    [
        'nombre',
        'created_user_id',
        'updated_user_id',
        'tipo_cuenta_id'
    ];

    public function tipo_cuenta()
    {
        return $this->belongsTo('App\TipoCuenta');
    }

    public function transacciones()
    {
        return $this->hasMany('App\Transaccion');
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
