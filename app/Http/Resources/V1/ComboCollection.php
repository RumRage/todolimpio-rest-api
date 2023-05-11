<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ComboCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($combo) {
                return [
                    'id' => $combo->id,
                    'name' => $combo->name,
                    'price' => $combo->price,
                    'discount' => $combo->discount,
                    'total_price' => $combo->total_price,
                    'services' => ServiceResource::collection($combo->services),
                ];
            }),
        ];
    }
}
