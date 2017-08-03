<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentTypeCreateRequest extends FormRequest
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
            'document' => 'required|min:2|max:20'
        ];
    }

    public function attributes()
    {
        return [
            'document' => 'tipo de documento'
        ];
    }

    public function messages()
    {
        return [
            'document.required' => 'El :attribute es obligatorio.',
            'document.min' => 'El :attribute debe tener al menos 2 caracteres.',
            'document.max' => 'El :attribute no debe sobrepasar los 20 caracteres.'
        ];
    }

}
