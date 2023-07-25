<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|unique:categories,name,'.$this->route('category').',id,shop_id,'.shopId(),
            'category_id' => 'nullable|exists:categories,id,shop_id,'.shopId(),
            'is_show'     => 'required|boolean',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'        => trans('categories.name'),
            'category_id' => trans('menu.the category'),
            'is_show'     => trans('categories.is_show'),
        ];
    }

    protected function prepareForValidation(): void
    {
        if ( is_null( $this->is_show ) ) $this->merge(['is_show' => false]);
    }
}
