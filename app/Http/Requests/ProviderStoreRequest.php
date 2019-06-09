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
            'name' => 'required|min:4|max:10',
            'type_doc' => 'not_in:0',
            'num_doc' => 'required|min:8|max:10',
            'address' => 'required|min:8|max:50',
            'telephone_contact' => 'required|min:4|max:20',
            'contact' => 'required|email'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre no puede ser vacio',
            'name.min' => 'minimo puede ser 4 caracteres',
            'name.max' => 'maximo puede ser 10 caracteres',
                  
           


            'type_doc.not_in' => 'El campo tipo de documento no puede ser vacio',
 


            'num_doc.required' => 'El campo numero de documento no puede ser vacio',
            'num_doc.min' => 'El campo numero de documento minimo puede ser 8 caracteres',
            'num_doc.max' => 'El campo numero de documento maximo puede ser 10 caracteres',

            'address.required' => 'El campo direccion no puede ser vacio',
            'address.min' => 'El campo direccion minimo puede ser 8 caracteres',
            'address.max' => 'El campo direccion maximo puede ser 50 caracteres',

            'telephone_contact.required' => 'El campo telefono no puede ser vacio',
            'telephone_contact.min' => 'El campo telefono minimo puede ser 4 caracteres',
            'telephone_contact.max' => 'El campo telefono maximo puede ser 10 caracteres',



            'contact.required' => 'El campo email no puede ser vacio',
            'contact.email' => 'El campo tiene que ser un correo electronico valido'
            
        ];
}
}
