<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TipoCuenta extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'created_user' => $this->created_user,
            'updated_user' => $this->updated_user,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
