<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change to false if authorization is needed
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:warehouses,name',
        ];
    }

    /**
     * Custom error messages (optional).
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The warehouse name is required.',
            'name.unique' => 'A warehouse with this name already exists.',
        ];
    }
}
