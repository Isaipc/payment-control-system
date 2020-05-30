<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    public const BIENES = array(
        'Activos fijos',
        'Equipo',
        'Suministros',
        'Material papelería',
        'Químicos'
    );

    public const PASIVOS = array(
        'Pasivo'
    );

    public const CAPITAL = array(
        'Capital'
    );

    public const INGRESOS = array(
        'Servicio libre',
        'Clase con entrenador'
    );

    public const GASTOS = array(
        'Gastos',
        'Gastos salariales',
        'Reconocimiento',
        'Viaticos',
        'Honorario entrenador',
        'Honorario alberquero',
        'Honorario administrador',
        'Honorario suplente',
    );

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
