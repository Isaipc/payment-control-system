<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TipoCuenta;
use App\Cuenta;

class CuentaController extends Controller
{
    protected $_cuenta;

    public function __construct()
    {
        $this->_cuenta = new Cuenta;
    }

    public function setTipoCuenta($tipo_cuenta)
    {
        $this->_cuenta->tipo_cuenta_id =  array_search($tipo_cuenta, TipoCuenta::TIPOS_CUENTAS);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_cuenta_id = $this->_cuenta->tipo_cuenta_id;

        return is_null($tipo_cuenta_id)
        ? Cuenta::orderBy('created_at', 'DESC')->get()
        : Cuenta::orderBy('created_at', 'DESC')
          ->where('tipo_cuenta_id', $tipo_cuenta_id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->save_cuenta($request);
        return response()->json($this->_cuenta, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  Cuenta::where('id', $id)
                ->where('tipo_cuenta_id', $this->_cuenta->tipo_cuenta_id)
                ->firstOrFail();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->_cuenta =  Cuenta::where('id', $id)
                    ->where('tipo_cuenta_id', $this->_cuenta->tipo_cuenta_id)
                    ->firstOrFail();

        $this->save_cuenta($request);
        return response()->json($_cuenta, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->_cuenta =  Cuenta::where('id', $id)
                    ->where('tipo_cuenta_id', $this->_cuenta->tipo_cuenta_id)
                    ->firstOrFail();
        $this->_cuenta->delete();

        return response()->json(null, 204);
    }

    private function save_cuenta(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'created_user_id' => 'required',
            'updated_user_id' => 'required'
        ]);

        $this->_cuenta->fill([
            'nombre' => $request->nombre,
            'created_user_id' => $request->created_user_id,
            'updated_user_id' => $request->updated_user_id
        ])->save();
    }
}
