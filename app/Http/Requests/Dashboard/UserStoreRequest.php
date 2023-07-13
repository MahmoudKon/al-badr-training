<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'     => 'required|string|min:2|max:190',
            'email'    => 'required|string',
            'address'    => 'required|string',
            'phone'    => 'required|string',
            'companyname'    => 'required|string',
            'password' => (request()->method() == 'post' ? 'required' : 'nullable') . '|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'     => trans('users.name'),
            'email'    => trans('users.email'),
            'password' => trans('users.password'),
            'address'     => trans('users.address'),
            'phone'    => trans('users.phone'),
            'companyname' => trans('users.companyname'),
        ];
    }

    protected function prepareForValidation(): void
    {
        //
    }
}
