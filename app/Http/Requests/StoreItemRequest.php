<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
        return [//'name','description','price','is_active','shop_id','unit_id','category_id'
            'name'=>'required|min:3|string',
            'description'=>'required|min:3|string',
            'price'=>'required',
            'is_active'=> 'required',
            'shop_id'=>'required',
            'unit_id'=>'required',
            'category_id'=>'required',

        ];
    }

    public function attributes(): array
    {
        return [
            //
        ];
    }

    protected function prepareForValidation(): void
    {
        //
    }
}
