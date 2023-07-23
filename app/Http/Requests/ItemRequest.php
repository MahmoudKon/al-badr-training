<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:190',
            'description' => 'required|string|min:2|max:190',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'unit_id' => 'required|numeric',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'ألاسم',
            'description' => 'الوصف',
            'price' => 'السعر',
            'category_id' => 'القسم',
            'unit_id' => 'الوحدة',
        ];
    }

    protected function prepareForValidation(): void
    {
        //
    }
}
