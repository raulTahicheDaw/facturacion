<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'identificacion_fiscal' => 'max:20',
            'nombre' => 'required|max:50',
            'nombre_comercial' => 'max:50',
            'contacto' => 'max:50',
            'direccion' => 'required|max:150',
            'municipio' => 'max:50',
            'codigo_postal' => 'max:10',
            'provincia' => 'max:50',
            'telefono' => 'max:50',
            'movil' => 'max:50',
            'fax' => 'max:50',
            'cuenta_bancaria' => 'max:50',
            'banco' => 'max:50',
            'email' => 'max:50',
            'web' => 'max:50',
            'observaciones' => 'max:1000'
        ];
    }

    public function messages()
    {
        return [
            'max' => 'El campo :attribute no puede tener mas de :max caracteres',
            'required' => 'El campo :attribute es Obligatorio'
        ];
    }
}
