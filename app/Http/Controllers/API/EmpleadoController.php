<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::where('estatus', 1)
                    ->orderBy('created_at', 'DESC')
                    ->get();
        return $empleados;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = $this->save_empleado(new Empleado, $request);
        return response()->json($empleado, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return $empleado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $this->save_empleado($empleado, $request);
        return response()->json($empleado, 200);
    }

        /**
         * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return response()->json(null, 204);
    }

    protected function save_empleado(Empleado $empleado, Request $request)
    {
        $request->validate([
            // 'rfc' => 'max:13|unique:empleados',
            // 'rfc' => 'required|max:13|unique:empleados',
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'max:12'
        ]);

        $empleado->fill([
            'nombre' => mb_strtoupper($request->nombre, 'UTF-8'),
            'apellidos' => mb_strtoupper($request->apellidos, 'UTF-8'),
            'telefono' => $request->telefono,
            'direccion' => $request->direccion == '' ? null : mb_strtoupper($request->direccion, 'UTF-8'),
            'rfc' => $request->rfc == '' ? null : mb_strtoupper($request->rfc, 'UTF-8'),
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida,
            'honorario' => $request->honorario,
            'nacimiento' => $request->nacimiento
        ])->save();

        return $empleado;
    }
}
