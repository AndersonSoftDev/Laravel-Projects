<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequisitionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'requisition_id' => $this->requisition_id,
            'name' => $this->name,
            'requested_quantity' => $this->quantity,
            'total' => $this->total,
            'product' => new ProductResource($this->whenLoaded('product'))
        ];
    }
}
