<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderUpdateRequest extends FormRequest
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
        $provider = $this->route('provider');

        return [
            'name' => 'required|min:4|max:20',
            'type_doc' => 'not_in:0',
            'num_doc' => 'required|min:8|max:10',
            'address' => 'required|min:8|max:50',
            'contact' => 'required|email',
            'telephone_contact' => 'required|min:7|max:10'
        ];
    }
        public function messages()
        {
            return [
                'name.required' => 'El campo "Nombre" no puede estar vacío.',
                'name.min' => 'El campo "Nombre" debe ser de mínimo 4 letras.',
                'name.max' => 'El campo "Nombre" debe ser de máximo 20 letras.',
    
                'type_doc.not_in' => 'El selector de "Tipo de documento" no puede estar vacío.',
     
                'num_doc.required' => 'El campo "Número de documento de identidad" no puede estar vacío.',
                'num_doc.min' => 'El campo "Número de documento de identidad" debe ser de 8 dígitos.',
                'num_doc.max' => 'El campo "Número de documento de identidad" debe ser de 10 dígitos.',
    
                'address.required' => 'El campo "Dirección de contacto" no puede estar vacío.',
                'address.min' => 'El campo "Dirección de contacto" debe ser de mínimo 8 caracteres.',
                'address.max' => 'El campo "Dirección de contacto" debe ser de máximo 50 caracteres.',
    
                'contact.required' => 'El campo "Correo electrónico de contacto" no puede estar vacío.',
                'contact.email' => 'Ingrese una dirección de correo electrónico correcta.',
    
                'telephone_contact.required' => 'El campo "Número telefónico de contacto" no puede estar vacío.',
                'telephone_contact.min' => 'El campo "Número telefónico de contacto" debe ser de mínimo 7 dígitos.',
                'telephone_contact.max' => 'El campo "Número telefónico de contacto" debe ser de máximo 10 dígitos.'
            ];
        }
    }
