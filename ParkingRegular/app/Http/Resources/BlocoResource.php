<?php

namespace App\Http\Resources;

use App\Enums\StatusVaga;
use App\Models\Bloco;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlocoResource extends JsonResource
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
            'bloco' => $this->bloco,
            'disponibilidade' => $this->disponibilidade,
            'vagas' => VagaResource::collection($this->whenLoaded('vagas')),

        ];
    }
}
