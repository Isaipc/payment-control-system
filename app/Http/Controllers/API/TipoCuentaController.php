<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TipoCuenta as TipoCuentaResource;
use App\Http\Resources\TipoCuentaCollection;
use App\TipoCuenta;

class TipoCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TipoCuentaCollection(
            TipoCuenta::orderBy('created_at', 'DESC')->get()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  TipoCuenta $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new TipoCuentaResource(TipoCuenta::findOrFail($id));
    }
}
