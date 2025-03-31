<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @class ProductRequest request validator
 */
class ProductRequest extends FormRequest
{
    /**
     * @var string $route_parameter
     */
    protected static string $route_parameter = 'product';

    /**
     * @private array $rules
     * @return array
     */
    private function rulesList(): array
    {
        return [
            'store' => [
                'product_name'  => 'required|string|max:255',
                'type'          => 'required|string|max:255',
                'producer'      => 'nullable|string|max:255',
                'barcode'       => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('products', 'barcode'),
                ],
            ],
            'update' => [
                'product_name'  => 'required|string|max:255',
                'type'          => 'required|string|max:255',
                'producer'      => 'nullable|string|max:255',
                'barcode'       => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('products', 'barcode')->ignore($this->product),
                ],
            ],
            'destroy' => [
                'id' => 'required|int|exists:products,id',
            ],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return $this->rulesList()[$this->route()->getActionMethod()] ?? [];
    }
}
