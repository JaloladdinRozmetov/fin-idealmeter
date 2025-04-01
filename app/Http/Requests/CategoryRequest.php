<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * @var string $route_parameter
     */
    protected static string $route_parameter = 'category';

    /**
     * @private array $rules
     * @return array
     */
    private function rulesList(): array
    {
        return [
            'store' => [
                'name'  => 'required|string|max:255',
            ],
            'update' => [
                'name'  => 'required|string|max:255',
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
