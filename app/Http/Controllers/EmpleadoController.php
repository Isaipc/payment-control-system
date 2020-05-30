<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
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
        $empleados = Empleado::where('estatus', 1)
                    ->orderBy('created_at', 'DESC')
                    ->get();
        $count_empleados = $empleados->count();
        return view('empleados.index', ['empleados' => $empleados, 'count_empleados' => $count_empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->save_empleado(new Empleado, $request))
            return redirect('/empleados')->with('success', 'Empleado creado correctamente');
        else
            dd($empleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $empleado = Empleado::find($request->id);
        return response()->json(['success' => true, 'empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', ['empleado' => $empleado]);
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
        if($this->save_empleado($empleado, $request))
            return redirect('/empleados')->with('success', 'Empleado actualizado correctamente');
        else
            return view('empleados.edit', ['empleado' => $empleado]);
    }

        /**
         * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        // $empleado->estatus = false;
        if($empleado->delete())
            return redirect('/empleados')->with('success', 'Empleado eliminado correctamente');
        else
            return redirect('/empleados')->with('error', 'El empleado no se pudo eliminar correctamente');
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

    // public function generarPDF()
    // {
    //     $empleados = Empleado::orderBy('nombre', 'ASC')->get();
    //     $pdf = PDF::loadView('empleados.list', compact('empleados'))
    //     ->setPaper('letter','landscape');
    //     return $pdf->stream();
    // }
}
