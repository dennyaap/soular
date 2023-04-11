<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'unique:materials'],
        ];
    }

    public function messages() {
        return [
            'required'=> ':attribute обязательно для заполнения',
            'min' => 'Минимальная длина поля :attribute : :min',
            'unique' => 'Такое название материала уже существует'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Наименование',
        ];
    }
}