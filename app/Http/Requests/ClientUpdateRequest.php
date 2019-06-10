<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
        $client = $this->route('client');
        return [
            'name' => 'required|min:4|max:20',
            'lastname' => 'required|min:4|max:20',
            'type_doc' => 'not_in:0',
            'num_doc' => 'required|min:8|max:12',
            'address' => 'required|min:8|max:50',
            'telephone' => 'required|min:7|max:10',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo "Nombre(s)" no puede estar vacío.',
            'name.min' => 'El campo "Nombre" debe ser de mínimo 6 letras.',
            'name.max' => 'El campo "Nombre" debe ser de máximo 20 letras.',
                  
            'lastname.required' => 'El campo "Apellido(s)" no puede estar vacío.',
            'lastname.min' => 'El campo "Apellido" debe ser de mínimo 6 letras.',
            'lastname.max' => 'El campo "Apellido" debe ser de máximo 20 letras.',

            'type_doc.not_in' => 'El selector de "Tipo de documento" no puede estar vacío.',
 
            'num_doc.required' => 'El campo "Número de documento de identidad" no puede estar vacío.',
            'num_doc.min' => 'El campo "Número de documento de identidad" debe ser de mínimo 8 dígitos.',
            'num_doc.max' => 'El campo "Número de documento de identidad" debe ser de máximo 12 dígitos.',

            'address.required' => 'El campo "Dirección de residencia" no puede estar vacío.',
            'address.min' => 'El campo "Dirección de residencia" debe ser de mínimo 8 caracteres.',
            'address.max' => 'El campo "Dirección de residencia" debe ser de máximo 50 caracteres.',

            'telephone.required' => 'El campo "Número telefónico" no puede estar vacío.',
            'telephone.min' => 'El campo "Número telefónico" debe ser de mínimo 7 dígitos.',
            'telephone.max' => 'El campo "Número telefónico" debe ser de máximo 10 dígitos.',

            'email.required' => 'El campo "Correo electrónico" no puede estar vacío.',
            'email.required' => 'Ingrese una dirección de correo electrónico correcta.'
            
        ];
    }
}