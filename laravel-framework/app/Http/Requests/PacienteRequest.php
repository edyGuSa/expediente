<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
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
            'name'              => 'required',
            'lastname'          => 'required', 
            'email'             => 'required|email',
            'direccion'         => 'required',
            'fecha_nacimiento'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Dato requerido',
            'lastname.required'         => 'Dato requerido', 
            'email.required'            => 'Dato requerido',
            'email.email'               => 'Formato invalido',
            //'email.unique'              => 'Este email ya esta registrado',
            'direccion.required'        => 'El dato es requerido',
            'fecha_nacimiento.required' => 'El Dato es requerido',
        ];
    }
}
