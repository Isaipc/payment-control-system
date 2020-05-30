<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Cuenta as CuentaResource;
use App\Http\Resources\CuentaCollection;
use App\Cuenta;

class CuentaController extends Controller
{
    protected $_cuenta;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tipo_cuenta_id)
    {
        return new CuentaCollection(
            Cuenta::where('tipo_cuenta_id', $tipo_cuenta_id)
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
    public function store($tipo_cuenta_id, Request $request)
    {
        $this->_cuenta = new Cuenta;
        $request->tipo_cuenta_id = $tipo_cuenta_id;
        $this->save($request);
        return response()->json($this->_cuenta, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Cuenta $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CuentaResource(Cuenta::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Cuenta $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuenta $cuenta)
    {
        $this->_cuenta = $cuenta;
        $this->save($request);

        return response()->json($this->_cuenta, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Cuenta $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta)
    {
        $cuenta->delete();
        return response()->json(null, 204);
    }

    private function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            // 'tipo_cuenta_id' => 'required',
            'created_user_id' => 'required',
            'updated_user_id' => 'required',
        ]);

        $this->_cuenta->fill([
            'nombre' => $request->nombre,
            'tipo_cuenta_id' => $request->tipo_cuenta_id,
            'created_user_id' => $request->created_user_id,
            'updated_user_id' => $request->updated_user_id,
        ])->save();
    }
}
