<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::where('estatus', 1)
                    ->orderBy('created_at', 'DESC')
                    ->get();
        return $clientes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = $this->save_cliente(new Cliente, $request);
        return response()->json($cliente, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $this->save_cliente($cliente, $request);
        return response()->json($cliente, 200);
    }

        /**
         * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json(null, 204);
    }

    protected function save_cliente(Cliente $cliente, Request $request)
    {
        $request->validate([
            // 'rfc' => 'max:13|unique:clientes',
            // 'rfc' => 'required|max:13|unique:clientes',
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'max:12'
        ]);

        $cliente->fill([
            'nombre' => mb_strtoupper($request->nombre, 'UTF-8'),
            'apellidos' => mb_strtoupper($request->apellidos, 'UTF-8'),
            'telefono' => $request->telefono,
            'direccion' => $request->direccion == '' ? null : mb_strtoupper($request->direccion, 'UTF-8'),
            'rfc' => $request->rfc == '' ? null : mb_strtoupper($request->rfc, 'UTF-8'),
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida,
            'nacimiento' => $request->nacimiento,
            'pago' => $request->pago,
            'debe' => $request->debe,
            'es_nadador_indie' => $request->es_nadador_indie,
        ])->save();

        return $cliente;
    }
}
