<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $count_clientes = $clientes->count();
        return view('clientes.index', ['clientes' => $clientes, 'count_clientes' => $count_clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->save_cliente(new Cliente, $request))
            return redirect('/clientes')->with('success', 'Cliente creado correctamente');
        else
            dd($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cliente = Cliente::find($request->id);
        return response()->json(['success' => true, 'cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', ['cliente' => $cliente]);
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
        if($this->save_cliente($cliente, $request))
            return redirect('/clientes')->with('success', 'Cliente actualizado correctamente');
        else
            return view('clientes.edit', ['cliente' => $cliente]);
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
        return redirect('/clientes')->with('success', 'Cliente eliminado correctamente');
    }


    protected function save_cliente(Cliente $cliente, Request $request )
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

    // public function generarPDF()
    // {
    //     $clientes = Cliente::orderBy('nombre', 'ASC')->get();
    //     $pdf = PDF::loadView('clientes.list', compact('clientes'))
    //     ->setPaper('letter','landscape');
    //     return $pdf->stream();
    // }
}
