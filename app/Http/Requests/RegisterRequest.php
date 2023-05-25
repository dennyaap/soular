<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Разрешение использования веми пользователя
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    // Правила валидации
    public function rules()
    {
        return [
            'name'=> ['required', 'regex:/^[а-яё\s\-]+$/iu'],
            'surname'=> ['required', 'regex:/^[а-яё\s\-]+$/iu'],
            'patronymic'=> ['required', 'regex:/^[а-яё\s\-]+$/iu'],
            'phone'=> ['required'],
            'email'=> ['required', 'email', 'unique:users'],
            'password'=> ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле обязательно для заполнения',
            'unique' => 'Поле ":attribute" должно быть уникальным',
            'regex' => 'Поле ":attribute" не соответствует шаблону',
            'email' => 'Email введет некорректно',
            'confirmed' => 'Пароли не совпадают'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'email' => 'Почта',
            'password' => 'Пароль',
            'phone' => 'Телефон',
        ];
    }
}