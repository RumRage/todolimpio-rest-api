<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ScheduleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        return [
        'data' => $this->collection->map(function ($schedule) {
            return [
            'id' => $schedule->id,
            'name' => $schedule->name,
            'tel' => $schedule->tel,
            'address' => $schedule->address,
            'date_time' => $schedule->date_time,
            'price' => $schedule->price,
            'discount' => $schedule->discount,
            'total_price' => $schedule->total_price,
            'payments' => $schedule->payments,
            'status' => $schedule->status,
            'combos' => ComboResource::collection($schedule->combos),
            ];
        }), 
    ];
    }
}
