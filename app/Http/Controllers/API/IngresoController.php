<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Ingreso;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ingreso::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingreso = $this->save_ingreso(new Ingreso, $request);
        return response()->json($ingreso, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingreso $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show(Ingreso $ingreso)
    {
        return $ingreso;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingreso $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingreso $ingreso)
    {
        $ingreso = $this->save_ingreso($ingreso, $request);
        return response()->json($ingreso, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingreso $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingreso $ingreso)
    {
        $ingreso->delete();
        return response()->json($data, 204);
    }


    protected function save_ingreso(Ingreso $ingreso, Request $request)
    {
        $request->validate([
            'tipo_in_id' => 'required',
            'emp_id' => 'required',
            'cli_id' => 'required'
        ]);

        $ingreso->tipo_in_id = $request->tipo_in_id;
        $ingreso->emp_id = $request->emp_id;
        $ingreso->cli_id = $request->cli_id;
        // $ingreso->save();

        return $request;
    }
}
