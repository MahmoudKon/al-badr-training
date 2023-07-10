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
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|max:14',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'name.string' => 'يجب الا يحتوي الاسم علي ارقام او رموز',
            'name.max' => 'الاسم اطول من اللازم',
            'name.min' => 'يجب الا يقل الاسم عن ثلاثه احرف',

            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'الريد الالكتروني غير صحيح',
            'email.unique' => 'البريد الالكتروني مسنخدم بالفعل',

            'password.required' => 'كلمة المرور مطلوبة',
            'password.max' => 'كلمة المرور يجب الا تزيد عن 14 حرف',
            'password.min' => 'كلمة المرور قصيرة',
            'password.confirmed' => 'كلمةالمرور غير متطابقة',

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
