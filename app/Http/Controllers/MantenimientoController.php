<?php

namespace App\Http\Controllers;

use App\Mantenimiento;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
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
        $mantenimiento = Mantenimiento::orderBy('created_at', 'DESC')->get();
        $count_mantenimiento = $mantenimiento->count();
        return view('mantenimiento.index', ['mantenimiento' => $mantenimiento, 'count_mantenimiento' => $count_mantenimiento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mantenimiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'rfc' => 'max:13|unique:mantenimiento',
            // 'rfc' => 'required|max:13|unique:mantenimiento',
            // 'nombre' => 'required',
            // 'apellidos' => 'required',
            // 'telefono' => 'max:12'
        ]);

        $mantenimiento = new Mantenimiento;
        $mantenimiento->nombre = mb_strtoupper($request->nombre, 'UTF-8');
        $mantenimiento->tipo = mb_strtoupper($request->tipo, 'UTF-8');
        $mantenimiento->costo = $request->costo;
        $mantenimiento->fecha_compra = $request->fecha_compra;

        if($mantenimiento->save())
            return redirect('/mantenimiento')->with('success', 'Mantenimiento creado correctamente');
        else
            dd($mantenimiento);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $mantenimiento = Mantenimiento::find($request->id);
        return response()->json(['success' => true, 'mantenimiento' => $mantenimiento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Mantenimiento $mantenimiento)
    {
        return view('mantenimiento.edit', ['mantenimiento' => $mantenimiento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mantenimiento $mantenimiento)
    {
        $request->validate([
            // 'rfc' => 'max:13|unique:mantenimiento',
            // 'rfc' => 'required|max:13|unique:mantenimiento',
            // 'nombre' => 'required',
            // 'apellidos' => 'required',
            // 'telefono' => 'max:12'
        ]);

        $mantenimiento->nombre = mb_strtoupper($request->nombre, 'UTF-8');
        $mantenimiento->tipo = mb_strtoupper($request->tipo, 'UTF-8');
        $mantenimiento->costo = $request->costo;
        $mantenimiento->fecha_compra = $request->fecha_compra;

        if($mantenimiento->save())
            return redirect('/mantenimiento')->with('success', 'Mantenimiento actualizado correctamente');
        else
            return view('mantenimiento.edit', ['mantenimiento' => $mantenimiento]);
        }

        /**
         * Remove the specified resource from storage.
     *
     * @param  \App\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mantenimiento $mantenimiento)
    {
        $mantenimiento->delete();
        return redirect('/mantenimiento')->with('success', 'Mantenimiento eliminado correctamente');
    }

    // public function generarPDF()
    // {
    //     $mantenimiento = Mantenimiento::orderBy('nombre', 'ASC')->get();
    //     $pdf = PDF::loadView('mantenimiento.list', compact('mantenimiento'))
    //     ->setPaper('letter','landscape');
    //     return $pdf->stream();
    // }
}
