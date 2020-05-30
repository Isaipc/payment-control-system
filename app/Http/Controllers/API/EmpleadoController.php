<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;

class EmpleadoController extends PersonaController
{
    function __construct()
    {
        parent::__construct();
        parent::setCategoria(Categoria::EMPLEADOS);
    }
}
