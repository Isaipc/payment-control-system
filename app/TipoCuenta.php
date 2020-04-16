<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{

    public const BIENES = self::TIPOS_CUENTAS[1];
    public const PASIVOS = self::TIPOS_CUENTAS[2];
    public const CAPITAL = self::TIPOS_CUENTAS[3];
    public const INGRESOS = self::TIPOS_CUENTAS[4];
    public const GASTOS = self::TIPOS_CUENTAS[5];

    public const TIPOS_CUENTAS = array(
        1 => 'Bienes',
        2 => 'Pasivos',
        3 => 'Capital',
        4 => 'Ingresos',
        5 => 'Gastos',
    );

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
}
