<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoIngreso extends Model
{
    protected $fillable =
    [
        'concepto',
        'monto',
        'tipo'
    ];
}
