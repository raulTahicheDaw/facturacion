<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarifaRequest extends FormRequest
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
            'nombre' => 'required|max:50',
            'descripcion' => 'string|max:500',
            'precio_hora' => "required|regex:/^\d*(\.\d{1,2})?$/",

        ];
    }

    public function messages()
    {
        return [
            'max' => 'El campo :attribute no puede tener mas de :max caracteres',
            'required' => 'El campo :attribute es Obligatorio',
            'regex' => 'Introduce una máximo de 2 decimales'
        ];
    }
}
