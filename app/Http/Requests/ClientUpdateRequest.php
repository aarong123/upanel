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
            'name' => 'required',
            'lastname' => 'required',
            'type_doc' => 'required',
            'num_doc' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'email' => 'required'
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'El campo "Nombre" no puede estar vacío.',
            'lastname.required' => 'El campo "Apellido" no puede estar vacío.',
            'type_doc.not_in' => 'El campo "Tipo de documento" no puede estar vacío.',
            'num_doc.required' => 'El campo "Número de documento de identidad" no puede estar vacío.',
            'address.required' => 'El campo "Dirección de residencia" no puede estar vacío.',
            'telephone.required' => 'El campo "Número telefónico" no puede estar vacío.',
            'email.required' => 'El campo "Correo electrónico" no puede estar vacío.'
            
        ];
    }
}