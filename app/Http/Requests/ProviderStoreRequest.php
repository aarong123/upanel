<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderStoreRequest extends FormRequest
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
            'name' => 'required',
            'type_doc' => 'not_in:0',
            'num_doc' => 'required',
            'address' => 'required',
            'telephone_contact' => 'required',
            'contact' => 'required|email'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre no puede ser vacio',
            'name.min' => 'minimo puede ser 6 caracteres',
            'name.max' => 'maximo puede ser 10 caracteres',
                  
           


            'type_doc.not_in' => 'El campo tipo de documento no puede ser vacio',
 


            'num_doc.required' => 'El campo numero de documento no puede ser vacio',
            'num_doc.min' => 'El campo numero de documento minimo puede ser 6 caracteres',
            'num_doc.max' => 'El campo numero de documento maximo puede ser 10 caracteres',

            'address.required' => 'El campo direccion no puede ser vacio',
            'address.min' => 'El campo direccion minimo puede ser 6 caracteres',
            'address.max' => 'El campo direccion maximo puede ser 10 caracteres',

            'telephone_contact.required' => 'El campo telefono no puede ser vacio',
            'telephone_contact.min' => 'El campo telefono minimo puede ser 10 caracteres',
            'telephone_contact.max' => 'El campo telefono maximo puede ser 20 caracteres',



            'email.required' => 'El campo email no puede ser vacio',
            'email.required' => 'tiene que ser email'
            
        ];
}
}
