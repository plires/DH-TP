<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewProductRequest extends FormRequest
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
             "title" => 'required | min:3',
             "description" => 'required | min:10',
             "price" => 'required',
             "img" => 'required',

        ];
    }

    public function messages()
    {
        return [
     'title.required' => 'El título de producto es obligatorio',
     'description.required' => 'La descripción es obligatoria',
     'price.required' => 'El precio es obligatorio',
     'img.required' => 'Ingrese al menos 7 dígitos',
      ];
    }
}
