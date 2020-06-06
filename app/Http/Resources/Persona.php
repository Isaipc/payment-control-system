<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Categoria as CategoriaResource;
use Carbon\Carbon;

class Persona extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rfc' => $this->rfc,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'hora_entrada' => $this->hora_entrada,
            'hora_salida' => $this->hora_salida,
            'nacimiento' => $this->nacimiento,
            'pago_fijo' => $this->pago_fijo,
            'categoria' => new CategoriaResource($this->categoria),
            'created_user' => $this->created_user,
            'updated_user' => $this->updated_user,
            'created_at' => Carbon::parse($this->created_at)->toDateTimeString(),
            'updated_at' => Carbon::parse($this->updated_at)->toDateTimeString(),
        ];
    }
}
