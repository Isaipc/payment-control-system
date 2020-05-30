<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Subcategoria as SubcategoriaResource;
use App\Http\Resources\SubcategoriaCollection;
use App\Subcategoria;

class SubcategoriaController extends Controller
{
    protected $_subcategoria;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoria_id)
    {
        return new SubcategoriaCollection(
            Subcategoria::where('categoria_id', $categoria_id)
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
        $this->_subcategoria = new Subcategoria;
        $this->_subcategoria->categoria_id = $categoria_id;
        $this->save($request);

        return response()->json($this->_subcategoria, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new SubcategoriaResource(
            Subcategoria::findOrFail($id)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategoria $subcategoria)
    {
        $this->_subcategoria = $subcategoria;
        $this->save($request);

        return response()->json($this->_subcategoria, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategoria $subcategoria)
    {
        $subcategoria->delete();
        return response()->json(null, 204);
    }

    protected function save(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required',
            'created_user_id' => 'required',
            'updated_user_id' => 'required',
        ]);

        $this->_subcategoria->fill([
            'nombre' => $request->nombre,
            // 'categoria_id' => $request->categoria_id,
            'created_user_id' => $request->created_user_id,
            'updated_user_id' => $request->updated_user_id,
        ])->save();
    }
}
