<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tel' => $this->tel,
            'address' => $this->address,
            'date_time' => $this->date_time,
            'price' => $this->price,
            'discount' => $this->discount,
            'total_price' => $this->total_price,
            'payments' => $this->payments,
            'status' => $this->status,
            'combos' => ComboResource::collection($this->whenLoaded('combos')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
