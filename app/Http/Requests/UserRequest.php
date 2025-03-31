<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @class UserRequest request validator
 */
class UserRequest extends FormRequest
{
    /**
     * @var string $route_parameter
     */
    protected static string $route_parameter = 'user';

    /**
     * @private array $rules
     * @return array
     */
    private function rulesList(): array
    {
        return [
            'store' => [
                'name'     => 'required|string|max:255',
                'email'    => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
                'password' => 'required|string|min:6|confirmed',
            ],
            'update' => [
                'name'     => 'required|string|max:255',
                'email'    => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user)],
                'password' => 'nullable|string|min:6|confirmed',
            ],
            'destroy' => [
                'id' => 'required|integer|exists:users,id',
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
