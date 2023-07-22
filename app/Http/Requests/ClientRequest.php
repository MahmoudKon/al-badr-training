<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => 'required|string|unique:units,name,'.$this->route('client').',id,shop_id,'.shopId(),
             'phone' => 'required|string|min:1',

        ];
    }

    public function attributes(): array
    {
        return [

            'name' => 'العميل',
        ];
    }

    protected function prepareForValidation(): void
    {
        //
    }
}
