<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'login' => 'required|exists:admins',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => '":attribute" обязательно для заполнения',
            'exists' => 'Неверный логин или пароль'
        ];
    }

    public function attributes()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }
}