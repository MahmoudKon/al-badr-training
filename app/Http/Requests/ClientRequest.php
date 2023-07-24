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

            'name' => 'required|string|unique:clients,name,'.$this->route('client').',id,shop_id,'.auth()->user()->shop_id,
            'phone' => 'required|string|unique:clients,phone,'.$this->route('client').',id,shop_id,'.auth()->user()->shop_id


       
                // 'name' => 'required|string'.$this->route('client').',id,shop_id,'.auth()->user()->shop_id,
                // 'phone' =>  'required|string'.$this->route('client').',id,shop_id,'.auth()->user()->shop_id,
  
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'العميل',
            'phone' => 'رقم الهاتف'

        ];
    }

    protected function prepareForValidation(): void
    {
        //
    }
}
