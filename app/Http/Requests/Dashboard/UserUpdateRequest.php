<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserUpdateRequest extends FormRequest
{

    public $user;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('user');
        $this->user = User::find($userId);
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'nullable|confirmed|min:8|max:14',
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
