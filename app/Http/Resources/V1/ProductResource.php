<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
<<<<<<< HEAD
        return [
=======
    return [
>>>>>>> a0a0412fc406268adaf849b81856f8f8f63919a8
        'id' => $this->id,
        'name' => $this->name,
        'description' => $this->description,
        'price' => $this->price,
        'supplier' => $this->supplier,
        'stock' => $this->stock
<<<<<<< HEAD
        ];
=======
    ];
>>>>>>> a0a0412fc406268adaf849b81856f8f8f63919a8
    }
}
