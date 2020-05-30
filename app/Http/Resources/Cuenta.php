<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TipoCuenta as TipoCuentaResource;

class Cuenta extends JsonResource
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
            'nombre' => $this->nombre,
            'tipo_cuenta' => new TipoCuentaResource($this->tipo_cuenta),
            'created_user' => $this->created_user,
            'updated_user' => $this->updated_user,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
