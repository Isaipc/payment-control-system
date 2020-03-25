<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEgreso extends Model
{
    protected $fillable =
    [
        'concepto',
        'monto',
        'tipo'
    ];
}
