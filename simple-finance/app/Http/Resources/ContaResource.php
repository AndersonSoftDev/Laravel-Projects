<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'Tipo_conta' => $this->tipo_conta,
            'moeda' => $this->moeda,
            'saldo' => $this->saldo,
            'activo' => $this->activo,
            'user' => new UserResource($this->whenLoaded('user'))
        ];
    }
}
