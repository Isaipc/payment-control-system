<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    protected $fillable =
    [
        'nombre',
        'created_user_id',
        'updated_user_id'
    ];

    public function cuentas()
    {
        return $this->hasMany('App\Cuenta');
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
