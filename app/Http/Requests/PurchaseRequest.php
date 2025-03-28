<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PurchaseRequest extends FormRequest
{
    /**
     * @var string $route_parameter
     */
    protected static string $route_parameter = 'purchase';

    /**
     * @private array $rules
     * @return array
     */
    private function rulesList(): array
    {
        return [
            'create' =>[
                'warehouse_id' => 'required|integer|exists:warehouses,id',
            ],
            'store' => [
                'contract_number'   => 'required|string|max:255|unique:purchases,contract_number',
                'warehouse_id'      => 'required|exists:warehouses,id',
                'product_id'        => 'required|exists:products,id',
                'quantity'          => 'required|min:1',
                'entire_price_per'  => 'required|numeric|min:0',
                'barcode'           => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('purchases', 'barcode'),
                ],
            ],
            'update' => [
                'contract_number'   => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('purchases', 'contract_number')->ignore($this->purchase),
                ],
                'warehouse_id'      => 'required|exists:warehouses,id',
                'product_id'        => 'required|exists:products,id',
                'quantity'          => 'required|integer|min:1',
                'entire_price_per'  => 'required|numeric|min:0',
                'barcode'           => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('purchases', 'barcode')->ignore($this->purchase),
                ],
            ],
            'destroy' => [
                'id' => 'required|int|exists:purchases,id',
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
