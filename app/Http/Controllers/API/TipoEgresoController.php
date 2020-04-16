<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\TipoEgreso;
use Illuminate\Http\Request;

class TipoEgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TipoEgreso::orderBy('tipo', 'DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_egreso = $this->save_tipo_egreso(new TipoEgreso, $request);
        return response()->json($tipo_egreso, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoEgreso $tipo_egreso
     * @return \Illuminate\Http\Response
     */
    public function show(TipoEgreso $tipo_egreso)
    {
        return $tipo_egreso;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoEgreso $tipo_egreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoEgreso $tipo_egreso)
    {
        $tipo_egreso = $this->save_tipo_egreso($tipo_egreso, $request);
        return response()->json($tipo_egreso, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoEgreso $tipo_egreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoEgreso $tipo_egreso)
    {
        $tipo_egreso->delete();
        return response()->json($data, 204);
    }


    protected function save_tipo_egreso(TipoEgreso $tipo_egreso, Request $request)
    {
        $request->validate([
            'concepto' => 'required'
        ]);

        $tipo_egreso->fill([
            'concepto' => mb_strtoupper($request->concepto, 'UTF-8'),
            'monto' => $request->monto,
            'tipo' => $request->tipo == '' ? null :  mb_strtoupper($request->tipo, 'UTF-8')
        ])->save();

        return $tipo_egreso;
    }
}
