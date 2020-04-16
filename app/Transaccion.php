<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $fillable =
    [
        'descripcion',
        'monto',
        'created_user_id',
        'updated_user_id',
        'cuenta_id'
    ];

    public function cuenta()
    {
        return $this->belongsTo('App\Cuenta');
    }
}
