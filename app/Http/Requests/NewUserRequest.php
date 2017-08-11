<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewUserRequest extends FormRequest
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
             "name" => 'required',
             "surname" => 'required',
             "email" => 'required | email',
             "phone" => 'required',
             "documentType" => 'required',
             "document" => 'required | numeric',
             "admin" => 'required | numeric',
             "password" => 'required',
             "rpassword" => 'required',
             "img" => 'required'

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'surname' => 'Apellido',
            'phone' => 'Teléfono',
            'documentType' => 'Tipo de Documento',
            'document' => 'Número de Documento',
            'admin' => 'Tipo de Usuario',
            'password' => 'Contraseña',
            'rpassword' => 'Repite Contraseña',
            'img' => 'imágen'
        ];
    }

    public function messages()
    {
        return [
     'name.required' => 'Ingrese su nombre',
     'surname.required' => 'Ingrese su apellido',
     'email.required' => 'Ingrese una dirección de mail válida',
     'phone.required' => 'Ingrese un Teléfono',
     'documentType.required' => 'Ingrese un tipo de documento válido',
     'document.required' => 'Ingrese un numero de documento válido',
     'admin.required' => 'Ingrese un Tipo de usuario',
     'password.required' => 'Ingrese un password',
     'rpassword.required' => 'Repita su password',
     'img.required' => 'Suba una imágen válida (PNG o JPG)'
      ];
    }
}
