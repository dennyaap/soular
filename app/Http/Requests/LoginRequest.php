<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|exists:users',
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
            'email' => 'email',
            'password' => 'Пароль',
        ];
    }
}