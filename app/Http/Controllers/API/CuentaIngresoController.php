<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TipoCuenta;

class CuentaIngresoController extends CuentaController
{
    function __construct()
    {
        parent::__construct();
        parent::setTipoCuenta(TipoCuenta::INGRESOS);
    }
}
