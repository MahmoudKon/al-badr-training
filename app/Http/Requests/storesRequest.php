<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storesRequest extends FormRequest
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
            'name' => 'required|string|unique:stores,name,'.$this->route('stores').',id,shop_id,'.shopId()

        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'المخزن',

        ];
    }

    
}
