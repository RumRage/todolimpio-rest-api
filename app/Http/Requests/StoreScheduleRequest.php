<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    { 
        return [
            //
            'name' => 'required|string',
            'tel' => 'required|numeric',
            'address' => 'required|string',
            'date_time' => 'required|date_format:Y/m/d H:i:s',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'total_price' => 'required|numeric',
            'payments' => 'required',
            'combo_id' => 'required|array',
            'combo_id.*' => 'required|integer',
        ];
    }
}
