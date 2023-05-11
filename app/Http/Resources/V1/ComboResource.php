<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComboResource extends JsonResource
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
        'name' => $this->name,
        'price' => $this->price,
        'discount' => $this->discount,
        'total_price' => $this->total_price,
        'services' => ServiceResource::collection($this->whenLoaded('services'))
        ];
    }
}