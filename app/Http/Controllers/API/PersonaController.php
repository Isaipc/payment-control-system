<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Persona as PersonaResource;
use App\Http\Resources\PersonaCollection;
use App\Persona;

class PersonaController extends Controller
{

    protected $_persona;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoria_id)
    {
        return new PersonaCollection(
            Persona::where('categoria_id', $categoria_id)
            ->orderBy('created_at', 'DESC')
            ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($categoria_id, Request $request)
    {
        $this->_persona = new Persona;
        $request->categoria_id = $categoria_id;
        $this->save($request);

        return response()->json($this->_persona, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PersonaResource(Persona::findOrFail($id));
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
        $this->_persona = $persona;
        $this->save($request);
        return response()->json($this->_persona, 200);
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

    protected function save(Request $request)
    {
        $request->validate([
            // 'rfc' => 'max:13|unique:personas',
            // 'rfc' => 'required|max:13|unique:personas',
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'max:12'
        ]);

        $this->_persona->fill([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'rfc' => $request->rfc,
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida,
            'nacimiento' => $request->nacimiento,
            'pago_fijo' => $request->pago_fijo,
            'es_nadador_indie' => $request->es_nadador_indie,
            'categoria_id' => $request->categoria_id,
            'puesto' => $request->puesto,
            'created_user_id' => $request->created_user_id,
            'updated_user_id' => $request->updated_user_id
        ])->save();
    }
}
