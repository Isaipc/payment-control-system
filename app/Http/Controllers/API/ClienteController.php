<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;

class ClienteController extends PersonaController
{
    function __construct()
    {
        parent::__construct();
        parent::setCategoria(Categoria::CLIENTES);
    }
}
