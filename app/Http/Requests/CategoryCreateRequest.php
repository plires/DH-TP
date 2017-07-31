<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'category' => 'required|min:2|max:20'
        ];
    }

    public function attributes()
    {
        return [
            'category' => 'nombre de la categoría'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'El :attribute es obligatorio.',
            'category.min' => 'El :attribute debe tener al menos 2 caracteres.',
            'category.max' => 'El :attribute no debe sobrepasar los 20 caracteres.'
        ];
    }

}
