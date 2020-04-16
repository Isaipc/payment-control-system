<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\TipoIngreso;
use Illuminate\Http\Request;

class TipoIngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TipoIngreso::orderBy('tipo', 'DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_ingreso = $this->save_tipo_ingreso(new TipoIngreso, $request);
        return response()->json($tipo_ingreso, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoIngreso $tipo_ingreso
     * @return \Illuminate\Http\Response
     */
    public function show(TipoIngreso $tipo_ingreso)
    {
        return $tipo_ingreso;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoIngreso $tipo_ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoIngreso $tipo_ingreso)
    {
        $tipo_ingreso = $this->save_tipo_ingreso($tipo_ingreso, $request);
        return response()->json($tipo_ingreso, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoIngreso $tipo_ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoIngreso $tipo_ingreso)
    {
        $tipo_ingreso->delete();
        return response()->json($data, 204);
    }


    protected function save_tipo_ingreso(TipoIngreso $tipo_ingreso, Request $request)
    {
        $request->validate([
            'concepto' => 'required'
        ]);

        $tipo_ingreso->fill([
            'concepto' => mb_strtoupper($request->concepto, 'UTF-8'),
            'monto' =>$request->monto,
            'tipo' => $request->tipo == '' ? null :  mb_strtoupper($request->tipo, 'UTF-8')
        ])->save();

        return $tipo_ingreso;
    }
}
