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
    public function toArray(Request $request): array
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
            'combos' => $this->combos->map(function ($combo) {
                return [
                    'id' => $combo->id,
                    'name' => $combo->name,
                    'total_price' => $combo->total_price,
                ];
            })
        ];
    }
}
