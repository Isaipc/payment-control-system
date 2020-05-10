<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Categoria;
use App\Subcategoria;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Persona::orderBy('created_at', 'DESC')
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = $this->save_persona(new Persona, $request);
        return response()->json($persona, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return $persona;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $this->save_persona($persona, $request);
        return response()->json($persona, 200);
    }

        /**
         * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return response()->json(null, 204);
    }

    protected function save_persona(Persona $persona, Request $request)
    {
        $request->validate([
            // 'rfc' => 'max:13|unique:personas',
            // 'rfc' => 'required|max:13|unique:personas',
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'max:12'
        ]);

        $persona->fill([
            'nombre' => mb_strtoupper($request->nombre, 'UTF-8'),
            'apellidos' => mb_strtoupper($request->apellidos, 'UTF-8'),
            'telefono' => $request->telefono,
            'direccion' => $request->direccion == '' ? null : mb_strtoupper($request->direccion, 'UTF-8'),
            'rfc' => $request->rfc == '' ? null : mb_strtoupper($request->rfc, 'UTF-8'),
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida,
            'nacimiento' => $request->nacimiento,
            'pago_fijo' => $request->pago_fijo,
            'es_nadador_indie' => $request->es_nadador_indie,
            'subcategoria_id' => $request->subcategoria_id,
            'created_user_id' => $request->created_user_id,
            'updated_user_id' => $request->updated_user_id
        ])->save();

        return $persona;
    }
}
