<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'name' => 'required|string|min:1',
            'address' => 'required|string|min:1',
            'phone' => 'required|string|min:1',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => trans('shops.name'),
            'address' => trans('shops.address'),
            'phone' => trans('shops.phone'),
        ];
    }
}
