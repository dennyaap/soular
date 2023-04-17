<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'surname' => ['required', 'min:3'],
            'patronymic' => ['required', 'min:3'],
            'age' => ['required', 'numeric'],
            'bio' => ['required', 'min:3'],
        ];
    }

    public function messages() {
        return [
            'required'=> ':attribute обязательно для заполнения',
            'numeric'=> 'Необходимо ввести числовое значение',
            'min' => 'Минимальная длина поля :attribute : :min'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'age' => 'Возраст',
            'bio' => 'Биография',
        ];
    }
}