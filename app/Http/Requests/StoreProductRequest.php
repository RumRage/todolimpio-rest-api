<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
<<<<<<< HEAD
            
=======

>>>>>>> a0a0412fc406268adaf849b81856f8f8f63919a8
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'supplier' => 'required',
            'stock' => 'required'
<<<<<<< HEAD
            ];
=======
        ];
>>>>>>> a0a0412fc406268adaf849b81856f8f8f63919a8
    }
}
