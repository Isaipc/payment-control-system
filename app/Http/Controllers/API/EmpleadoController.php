<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Categoria;
use App\Subcategoria;

class EmpleadoController extends PersonaController
{
    /**
     * Muestra la lista de empleados
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('personas')
        ->select(
            'personas.*',
            'subcategorias.nombre as subcategoria' ,
            'categorias.nombre as categoria'
        )
        ->join('subcategorias', 'subcategorias.id', '=', 'personas.subcategoria_id')
        ->join('categorias', function ($join){
            $join->on('categorias.id', '=', 'subcategorias.categoria_id')
            ->where('categorias.nombre', Categoria::EMPLEADOS);
        })
        ->orderBy('created_at', 'DESC')
        ->get();
    }
}
