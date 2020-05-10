<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TipoCuenta;

class CuentaGastoController extends CuentaController
{
    function __construct()
    {
        parent::__construct();
        parent::setTipoCuenta(TipoCuenta::GASTOS);
    }
}
